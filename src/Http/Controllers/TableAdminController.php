<?php namespace Vis\Builder;

use Vis\Builder\Facades\Jarboe as JarboeFacade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class TableAdminController extends Controller
{
    public function showTree()
    {
        $controller = JarboeFacade::tree();

        return $controller->handle();
    } // end showTree

    public function showTreeOther($nameTree)
    {
        $model = Config::get('builder.' . $nameTree . '_tree.model');
        $option = [];

        $controller = JarboeFacade::tree($model, $option, $nameTree."_tree");

        return $controller->handle();
    }

    public function handleTree()
    {
        $controller = JarboeFacade::tree();

        return $controller->process();
    } // end handleTree

    public function handleTreeOther($nameTree)
    {
        $model = Config::get('builder.' . $nameTree . '_tree.model');
        $option = [];

        $controller = JarboeFacade::tree($model, $option, $nameTree."_tree");

        return $controller->process();
    } // end handleTree


    public function showTreeAll($nameTree)
    {
        $model = Config::get('builder.' . $nameTree . '.model');
        $tree = $model::all()->toHierarchy();

        $idNode  = \Input::get('node', 1);
        $current = $model::find($idNode);

        $parentIDs = array();
        foreach ($current->getAncestors() as $anc) {
            $parentIDs[] = $anc->id;
        }

        return View::make('admin::tree.tree', compact("tree", "parentIDs"));
    }

    public function showPage($page)
    {
        $options = array(
            'url'      => '/admin/'.$page,
            'def_name' => $page,
        );

        $table = JarboeFacade::table($options)['showList'];

        return View::make('admin::table', compact('table'));
    }

    public function showPagePost($page)
    {
        $options = array(
            'url'      => '/admin/'.$page,
            'def_name' => $page,
        );

        return JarboeFacade::table($options)['showList'];
    }

    public function handlePage($page)
    {
        $options = array(
            'url'      => '/admin/'.$page,
            'def_name' => $page,
        );
        
        return JarboeFacade::table($options);
    } // end handleСases


    public function showPageUrlTree()
    {
        $arrSegments = explode("/", Request::path());
        $slug = end ($arrSegments);

        if (!$slug || $slug == LaravelLocalization::setLocale ()) {
            $slug = "/";
        }

        $_model = Config::get('builder.tree.model');
        $node = $_model::where ("slug", 'like', $slug)->first ();
        $templates = Config::get('builder.tree.templates');

        if (!isset($templates[$node->template])) {
            App::abort (404);
        }

        list($controller, $method) = explode ('@', $templates[$node->template]['action']);


        if (LaravelLocalization::setLocale () == "") {
            $pathUrl = "/" . Request::path ();
        } else {
            $pathUrl = Request::path ();
        }

        if ($pathUrl == LaravelLocalization::setLocale () . Request::path()) {
            Session::put ('currentNode', $node);
        } else {
            Session::put ('currentNode', $node);
        }

       return app('App\\Http\\Controllers\\' . $controller)->init($node, $method);
    }

}
