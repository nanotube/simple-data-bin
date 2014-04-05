##Simple Data Bin

This is a quick and easy way to set up a file host. All you need is a webhost, two small php files, and some config tweaks.

The code automatically prevents filename collisions by prepending a random hash to the filename.

In is important to set your webserver config to prevent script execution from the upload target directory, for security reasons (see setup instructions below).

##Installation instructions

1. Stick `upload.php` and `upload_file.php` into a web-accessible directory on your web host.
2. Create an `upload` subdirectory in the same location
3. Stick the provided `.htaccess` file inside the `upload` directory you created above. This will prevent script execution, and treat every file in that directory as a downloadable file.
 * This is important - someone could upload a malicious php script that your server would then happily execute. Double check that the .htaccess is effective - upload some test php files and make sure you can't get them to execute.
4. Configure your php settings to match your desired maximum uploaded file size. Sample php config lines provided in the `php.config.txt` snippet.
5. If you want to keep your databin free of cruft, create a cron job that automatically deletes old files. Sample crontab line provided in the included `crontab.txt` file.

Enjoy your data bin.
