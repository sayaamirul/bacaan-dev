<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/mai92/bacaan-dev.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts
host('103.127.133.35')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '  /var/www/sayamirul.com');

// Hooks

after('deploy:failed', 'deploy:unlock');
