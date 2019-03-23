<?php

namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'wp-packages-repo');

// Project repository
set('repository', 'git@github.com:TomodomoCo/wp-packages-repo.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server
set('writable_dirs', []);

// Use Server Pilot's composer 7.2
set('bin/composer', 'composer7.2-sp');

// Use a Capistrano-style release name
set('release_name', function () {
	return (string) run('date +"%Y%m%d%H%M%S"');
});

// Hosts
host('packages.tomodomo.co')
    ->user('packages')
    ->forwardAgent()
    ->set('deploy_path', '~/apps/tomodomo-packages/deploy');

// Tasks
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
