<?php
namespace Grav\Plugin;

use \Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

class MarkdownFontAwesomePlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onMarkdownInitialized' => ['onMarkdownInitialized', 0]
        ];
    }

    public function onMarkdownInitialized(Event $event)
    {
        $markdown = $event['markdown'];

        // Initialize Text example
        $markdown->addInlineType(':', 'FontAwesome');     // Backwards compatibility
        $markdown->addInlineType(':', 'FontAwesomePro');  // Widened support

        // Add function to handle this
        $markdown->inlineFontAwesome = function($excerpt) {
            // Search $excerpt['text'] for regex and store whole matching string in $matches[0], store icon name in $matches[1]
            if (preg_match('/:fa-([a-zA-Z0-9- ]+):/', $excerpt['text'], $matches))
            {
                return array(
                    'extent' => strlen($matches[0]),
                    'element' => array(
                        'name' => 'i',
                        'text' => '',
                        'attributes' => array(
                            'class' => 'fa fa-'.$matches[1],
                        ),
                    ),
                );
            }
        };

        // Add function to handle this
        $markdown->inlineFontAwesomePro = function($excerpt) {
            // Search $excerpt['text'] for regex and store whole matching string in $matches[0], store icon name in $matches[1]
            if (preg_match('/:fa([srlb]?) fa-([a-zA-Z0-9- ]+):/', $excerpt['text'], $matches))
            {
                return array(
                    'extent' => strlen($matches[0]),
                    'element' => array(
                        'name' => 'i',
                        'text' => '',
                        'attributes' => array(
                            'class' => 'fa'.$matches[1].' fa-'.$matches[2],
                        ),
                    ),
                );
            }
        };
    }
}
