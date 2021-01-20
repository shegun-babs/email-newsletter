@setup
    $localAppDirName = "email-newsletter";
    $remoteAppDirName = "newsletter";
    $remoteHomeDir = "~";
    $remoteAppDir = "/var/www/";
    $gitUrl = 'git@github.com:shegun-babs/email-newsletter.git';
    $remoteAppFullPath = "$remoteAppDir$remoteAppDirName";
    $localFullPath = "/var/www/$localAppDirName";
    $stubFile = "$localFullPath/envoy/nginx-bloc.stub";
    $domain_name = 'e-newsletter.ml';

    $replacement = [
        '%domain_name%' => $domain_name,
        '%www_root%' => "$remoteAppFullPath/public",
        '%php_version%' => '7.4',
    ];

    $rawNginxConfig = file_get_contents($stubFile);
    $rawNginxConfig = str_replace(array_keys($replacement), array_values($replacement), $rawNginxConfig);
@endsetup

@task('setup-webapp', ['on' => 'web'])


    #check if app folder exists exists already
    if [ -d {{ $remoteAppFullPath }} ]; then
        echo "APP already exists"
        exit 1
    fi


    #navigate to www dir
    echo "enter remote dir"
    cd {{ $remoteAppDir }}

    #do git clone
    echo "do git clone"
    sudo git clone {{ $gitUrl }} {{ $remoteAppDirName }}

    #enter dir
    echo "enter app dir"
    cd {{ $remoteAppFullPath }}

    #do composer install
    echo "do composer install"
    sudo composer install --no-interaction

    #make env copy
    echo "make .env copy"
    sudo cp .env.example .env
    sudo chmod 777 .env
    sudo chmod 777 -R storage/*
    sudo chmod 777 -R bootstrap
    php artisan key:generate

    #switch to /etc/nginx/sites-available
    echo "nginx sites-available"
    cd /etc/nginx/sites-available

    #create config
    echo "create server bloc file"
    sudo touch {{ $domain_name }}
    sudo chmod 777 {{ $domain_name }}
    echo -e "{{ $rawNginxConfig }}" >> {{ $domain_name }}
    sudo chmod 644 {{ $domain_name }}

    #switch to /etc/nginx/sites-enabled
    cd /etc/nginx/sites-enabled

    #create soft link
    echo "create symbolic link"
    sudo ln -s /etc/nginx/sites-available/{{ $domain_name }} {{ $domain_name }}

    #restart nginx
    echo "reload nginx";
    sudo systemctl restart nginx > /dev/null

    echo "Done";
@endtask
