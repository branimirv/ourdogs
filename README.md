# Our Dogs

1. Add to `etc/hosts` file `192.168.33.10 our-dogs.test`.
2. Run `vagrant up`
3. Run `cd wordpress/wp-content/themes/ourdogs`;
4. Run `npm install`
5. Run `npm run start`

For import database:

1. Run `vagrant ssh`
2. Run `cd /var/www/html`
3. Run (use WP-CLi) 'wp db import dbname'

Download uploads folder: https://www.dropbox.com/s/3f6iwxln8bq9c2z/uploads.zip?dl=0
