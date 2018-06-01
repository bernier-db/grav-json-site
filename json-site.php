<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;
use Grav\Common\Page\Page;

/**
 * Class JsonSitePlugin
 * @package Grav\Plugin
 */
class JsonSitePlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        $uri = $this->grav['uri']->path();
        $exclusions = $this->config->get('plugins.json-site.routeIgnores');

        if(array_search ($uri, $exclusions) !== false){
            return;
        }


        $route = $this->config->get('plugins.json-site.route');

        if ($route && $route == $uri) {
            $this->enable([
                'onPageInitialized' => ['onSiteDataUrl', 0],
                'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0]
            ]);
        }else {
            $this->enable([
                'onPageInitialized' => ['onPageInitialized', 0]
            ]);
        }
    }

    public function onPageInitialized()
    {
        /* @var \Grav\Common\Page\Page $page
    */
        $page = $this->grav['page'];
        $collection = $page->collection('content', false);
        $pageArray = $page->toArray();
        $children = array();
        $i =0;
        foreach ($collection as $item) {
            $template = $item->template();
            $children[] = $item->toArray();
            $children[$i]['template'] = $template;
            $i++;
        }
        $pageArray['children'] = $children;

        // Other informations about page
        $pageArray['template'] = $page->template();
        $pageArray['slug'] = $page->slug();
        $pageArray['permalink'] = $page->permalink();
        $pageArray['route'] = $page->route();
        $pageArray['raw_route'] = $page->rawRoute();
        $pageArray['route_canonical'] = $page->routeCanonical();
        $pageArray['path'] = $page->path();
        $pageArray['folder'] = $page->folder();

        // Get all medias
        $allmedias = $page->media()->all();
        $medias = array();
        foreach ($allmedias as $item) {
            $medias[] = $item->toArray();
        }
        $pageArray['medias'] = $medias;


        header("Content-Type: application/json");
        echo json_encode($pageArray);

        exit();
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }


    public function onSiteDataUrl(Event $e)
    {
        // set a dummy page
        $page = new Page;
        $page->init(new \SplFileInfo(__DIR__ . '/pages/siteData.md'));

        unset($this->grav['page']);
        $this->grav['page'] = $page;
    }
}
