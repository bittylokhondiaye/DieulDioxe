<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYiYG7u4\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYiYG7u4/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerYiYG7u4.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerYiYG7u4\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerYiYG7u4\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'YiYG7u4',
    'container.build_id' => 'e3253425',
    'container.build_time' => 1566386727,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerYiYG7u4');
