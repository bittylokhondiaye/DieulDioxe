<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerMShQIDp\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerMShQIDp/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerMShQIDp.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerMShQIDp\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerMShQIDp\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'MShQIDp',
    'container.build_id' => '542c6359',
    'container.build_time' => 1568835914,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerMShQIDp');
