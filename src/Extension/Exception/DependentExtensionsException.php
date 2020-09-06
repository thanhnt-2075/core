<?php

/*
 * This file is part of Flarum.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Flarum\Extension\Exception;

use Exception;
use Flarum\Extension\Extension;

class DependentExtensionsException extends Exception
{
    public $extension;
    public $dependent_extensions;

    /**
     * @param $extension: The extension we are attempting to activate.
     * @param $dependent_extensions: Extension IDs of the Flarum extensions that depend on this extension
     */
    public function __construct(Extension $extension, array $dependent_extensions = [])
    {
        $this->extension = $extension;
        $this->dependent_extensions = $dependent_extensions;

        parent::__construct(implode("\n", $dependent_extensions));
    }
}
