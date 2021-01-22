#@import('envoy/Envoy.blade.php')
#-----------------------------------------------------------------------------------|
# envoy run push --message='git message here' --prod
# envoy run pull-on-server
# envoy run deploy --message="git message here" --migrate --composer --prod
#-----------------------------------------------------------------------------------|
@servers(['local' => 'vagrant@localhost -p2223', 'web' => 'shegun@shegunbabs.com -p2442'])

@setup
    $localAppDir = "/var/www/email-newsletter";
    $remoteAppDirName = "newsletter";
    $remoteHomeDir = "~";
    $remoteAppDir = "/var/www/";
    $remoteAppFullPath = "$remoteAppDir$remoteAppDirName";
    $remotePhpVer = "php7.4";
@endsetup


# STORIES
@story('deploy')
    push
    pull-on-server
@endstory

@task('testing', ['on' => 'local'])

@endtask


# PUSH TASK #
#-----------#
@task('push', ['on' => 'local'])
    printf "$(date '+%d-%m-%Y %H-%M-%S')==== Start push command ====\n"

    cd {{ $localAppDir }}

    @if ($prod)
        npm run prod
    @endif

    printf "$(date '+%d-%m-%Y %H-%M-%S')==== Add untracked files ===="
        git add .

    printf "$(date '+%d-%m-%Y %H-%M-%S')==== Start git commit ===="
    @if ($message)
        git commit -m "{{ $message }}"
    @else
        git commit -m "regular update"
    @endif

    printf "$(date '+%d-%m-%Y %H-%M-%S')==== Git push to master ===="
    git push -u origin master

    php artisan inspire
    printf "\n"

@endtask
#-----------------------------------------------|


# PULL ON SERVER TASK START #
#---------------------------#
@task('pull-on-server', ['on' => 'web'])
    echo {{ date("d-m-Y H:i:s "). "==== Pull on server started ====\n" }}

    cd {{ $remoteAppFullPath }}

    echo {{ date("d-m-Y H:i:s "). "==== Bring app down with artisan down ====" }}
    php artisan down

    printf "$(date '+%d-%m-%Y %H-%M-%S')==== Clear cache & routes ===="
    php artisan route:clear
    php artisan event:clear

    echo {{ date("d-m-Y H:i:s "). "==== Start Git pull ====" }}
    sudo git stash
    sudo git pull

    @if( $composer )
        echo {{ date("d-m-Y H:i:s "). "==== Composer install ====" }}
        sudo composer install
    @endif

    printf "$(date '+%d-%m-%Y %H-%M-%S')==== Cache route & configs ===="
    #php artisan route:cache
    #php artisan event:cache


    @if ( $migrate )
        echo {{ date("d-m-Y H:i:s "). "==== Migrate pending tables ====" }}
        php artisan migrate --force
    @endif

    echo {{ date("d-m-Y H:i:s "). "==== Reload php-fpm and nginx ====" }}
    sudo service nginx reload
    sudo service {{ $remotePhpVer }}-fpm reload #> /dev/null

    echo {{ date("d-m-Y H:i:s "). "==== Bring App up using artisan up ====" }}
    php artisan up

@endtask
#-----------------------------------------------------------------------------------|

