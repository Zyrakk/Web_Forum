# Proyecto de pagina web

### Dependencies

```bash
# - Update the system - #
sudo apt update && sudo apt upgrade

# - Programs and dependencies - #

# - Apache2 Web Server -

	# Install and test Apache2
	sudo apt install apache2 -y
		# Get the hostname
		hostname -I
		# Test it in the web browser -> http://192.168.1.XXX/
	# Grant your user the permissions for apache2
	sudo usermod -a -G www-data 'user'
	sudo chown -R -f www-data:www-data /var/www/html
		# To apply the changes you need to log out and log in
	# Inside the directory /var/www/html you can put all the assets for your web page

# - PHP for Apache -

	# Installing dependencies
	sudo apt install php libapache2-mod-php php-mbstring php-mysql php-curl php-gd php-zip php-cgi php-json -y
	
	# Test if PHP is correctly installed
	sudo nano /var/www/html/example.php
		# Enter this prompt in the file
		<?php
		echo "Today's date is ".date('Y-m-d H:i:s');
		?>
		# Go to the page http://192.168.1.XXX/example.php
		# Replace XXX with your local address
		# It should appear like: 'Today's date is 2019-06-28 21:30:45'

# - MySQL Database -

	# Install and set up MySQL
	sudo apt install mariadb-server mariadb-common mariadb-client -y
	
	# Make secure your database with a preinstalled shell script
	sudo mariadb_secure_installation
		# Set a password for root user
		# Mark 'yes' on all the others options
	
	# Set up a new user for the database
	sudo mysql -u root -p
		# Enter the MySQL root password
	# Create the user for the database
	> CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
		# Replace username and password, keep the ''
	# Grant all privileges to the new user
	> GRANT ALL PRIVILEGES ON * . * TO 'username'@'localhost';
	> FLUSH PRIVILEGES;
	# If you dont want to use the command line to administrate your databases you can install PHPMyAdmin
	
	# If you want to use your database from PHP you need to install this module
	sudo apt install php-mysql -y

# - PHPMyAdmin -

	# Installing the package
	sudo apt install phpmyadmin -y
		# In the config screen select 'apache2' option pressing SPACE and ENTER
		# Select whatever you want on the other options, I recommend 'no'
		# Set a strong password to connect to MySQL through PHPMyAdmin
	
	# Configure Apache for PHPMyAdmin
	sudo nano /etc/apache2/apache2.conf
	# Add the following line to the bottom of this file without the ''
	'Include /etc/phpmyadmin/apache.conf'
	
	# Save and exit the file and disable the directory listing for apache2
	sudo a2dismod --force autoindex
	
	# Use the page you want adding that
	sudo nano /etc/apache2/sites-enabled/000-default.conf
		# Add before </VirtualHost> label
		<Directory /var/www/html>
			DirectoryIndex 'index'.html
			Options Indexes FollowSymLinks
			AllowOverride None
			Require all granted
		</Directory>
	
	# Restart apache2 service
	sudo service apache2 restart

```

### Setting up the Web Page

```bash

# 

```

### Connections

```bash
# - Be sure that the system is entirely up to date -
sudo apt update && sudo apt upgrade
```

##### SSH

```bash
# - SSH with Secure Connection -

	# Install and setup SSH
	sudo apt install openssh-server
	sudo systemctl status ssh
		# must be
		'Active: active (running)' # Press 'Q' to exit
		# if not, do:
		sudo systemctl enable ssh
		sudo systemctl start ssh
	
	# Create a user to use for the SSH connection
	useradd -d /home/'user' -m -s /bin/bash -g 'user' -G _ssh,sudo 'user'
		# replace 'user' with any name for the user
		# create a password for the new user
		passwd 'user'
	
	# Create the id_rsa pair key
	sudo ssh-keygen -t rsa -b 4096
		# Filename: 'sshkey'
		# PassPhrase: 'If you want more security put one'
	mkdir ~/.ssh
	cat sshkey.pub >> ~/.ssh/authorized_keys
	rm sshkey.pub
		# The sshkey file without extension is the private key, move it to your guest
	
	# Change the config for SSH to make it more secure
	cp /etc/ssh/sshd_config /etc/ssh/sshd_config_backup
	sudo nano /etc/ssh/sshd_config
	# We need to have this parameters like that:
		Port 22 # Change the port to anyone you can remember
		LoginGraceTime 1m # Put the time you need to log in
		PermitRootLogin no # We dont need to LogIn as root
		MaxAuthTries 3 # Max tries to put the password
		MaxSessions 1 # Max simultaneous sessions permitted
		PubkeyAuthentication yes # Use the pubkey generated early
		AuthorizedKeysFile .ssh/authorized_keys
		PasswordAuthentication no
		KbdInteractiveAuthentication no
		AllowUsers 'user1' 'user2'
		# Replace 'user1/2' with the users that you want to allow them to login

```

##### WireGuard

```bash
# - Instalation for a Raspberry PI -
	
	# Installing PiVPN
	curl -L https://install.pivpn.io | bash
	# Follow the Automated Installer with your requirements
		# Recommended settings:
			- DHCP > yes
			- VPN > WireGuard
			- PORT > 51820
			- DNS > OpenDNS
			- Pub_IP or DNS_name > Pub_IP
	
	# Adding a new Client
	pivpn add 
		# Add a name and it will generate the client and the keys

# - Installing and setting up WireGuard -
	
	# Installing WireGuard
	# Default Wireguard port -> 51820
	sudo apt-get install wireguard wireguard-tools
		
		# For Ubuntu 18.0 and before you need to do some extra steps
		sudo add-apt-repository ppa:wireguard/wireguard 
		sudo apt update 
		sudo apt install wireguard wireguard-tools
	
	# Initial Configuration for WireGuard
	
		# Each network interface has a private key and a list of peers.
		# Each peer has a public key
		
		# First, create the directory containing the wireguard config
		sudo -i
		cd /etc/wireguard
		umask 077
		
		# Generating the key
		wg genkey | tee server.key | wg pubkey > server.pub
		
		# Creating the WireGuard config
		sudo nano /etc/wireguard/wg0.conf
			# Put the following into it:
			[Interface]
			Address = 10.100.0.1/24, fd08:4711::1/64
			ListenPort = 47111
		
		# Run this commands
		echo "PrivateKey = $(cat server.key)" >> /etc/wireguard/wg0.conf
		exit (exit the sudo session)
		
		# With that config we'll be using the port 47111/UDP to the WireGuard server
		# Be sure that your router has a static public IP address or a domain name
	
	# Start the WireGuard server
	sudo systemctl enable wg-quick@wg0.service
	sudo systemctl daemon-reload
	sudo systemctl start wg-quick@wg0
	# You should not see any output
	
	# Possible errors
	
		RTNETLINK answers: Operation not supported
		Unable to access interface: Protocol not supported
		# You should check that the Wireguard kernel module is loaded with that command
		sudo modprobe wireguard
		# If you get an error, reinstall WireGuard or restart your server and try again
	
		RTNETLINK answers: File exists
		# That means that you need to check the configured IP Addresses
		# Any IP is overlapping
	
	# Check that everything is running correctly
	sudo wg
	
	# You should see an output like this
		interface: wg0
		  public key: XYZ123456ABC= <- Your public key will be different
		  private key: (hidden)
		  listening port: 47111
	
	# For more security you can mount a pihole with the 'Allow only local requests' option
	

# - Adding Clients to the WireGuard Server -


```

### Setting Up Additional Security

```bash
# - Be sure that the system is entirely up to date -
sudo apt update && sudo apt upgrade
```

##### Fail2Ban

	Fail2Ban is a piece of software that attempts to block malicious connections to your 
	device. It is important if you have SSH or even a web server that is publicly accessible.
	
	Fail2ban works by continually scanning your log files and looking for signs of potential 
	attacks. These include attacks such as too many password failures as well as scanning for 
	exploits and much more. 
	
	Once it finds unusual activity it then automatically updates your firewall to ban that IP 
	address.

```bash
# - Installing and setting up Fail2Ban -
	
	# Installing and setting up Fail2Ban
	sudo apt install fail2ban
	
	# Fail2Ban will generate a file called 'jail.conf', make a copy of that file
	sudo cp /etc/fail2ban/jail.conf /etc/fail2ban/jail.local
		# Lets search inside that file
		sudo nano /etc/fail2ban/jail.local
		# Inside use CTRL + W key to search for '[sshd]', we will find that text
		|[sshd] 
		|
		|port = ssh 
		|logpath = %(sshd_log)s 
		|backend = %(sshd_backend)s
		
		# Add all this lines behind '[sshd]'
		|enabled = true # This line enables Fail2Ban to process those rules
		|filter = sshd # This lines permit Fail2Ban to use the sshd.conf file
			# The sshd.conf file allows Fail2Ban to filter connections to the SSH port
		
		# We need to change also what Fail2Ban does when someone triggers the filters
		|banaction = iptables-multiport # Add that line after the lines above
		# You can find more actions checking out the /etc/fail2ban/action.d/ folder
		
		# To set the ban action we need to put the following values
		bantime = -1 # This sets the ban time for the user in seconds, -1 is indefinitely
		maxretry = 3 # This sets the maximum tries for the user to be banned
		
		# Now the file must be like this
		[sshd] 
		enabled = true 
		filter = sshd 
		port = ssh 
		banaction = iptables-multiport 
		bantime = -1 
		maxretry = 3 
		logpath = %(sshd_log)s 
		backend = %(sshd_backend)s
		# Save the file with CTRL + O then ENTER && CTRL + X then ENTER
		
		# Restart the Fail2Ban service and it's done
		sudo service fail2ban restart
		
		# If the service failed to start change this line
		backend = %(sshd_backend)s
		# To this one
		backend = systemd
		

# - Protecting Apache web server with Fail2Ban -
	
	# Open the jail local file
	sudo nano /etc/fail2ban/jail.local
	
	# Locate the section called '[apache-badbots]' with CTRL + W
	
	# Under the header add this lines
	enabled = true
	filter = apache-badbots
	# The filter name will be the same as the module unless you’re using a custom config file.
	
	# To find all the filter config files use an ls to this directory
	ls /etc/fail2ban/filter.d/
	
	# Once you're done modifying the file do CTRL + O and CTRL + X
	
	# Lastly remember to restart Fail2Ban service
	sudo service fail2ban restart

```

### Others

##### Terminal in web page

	I'll use Laravel, a framework from PHP
	The console is accesible from internet through our website

```bash
# - Installing PHP -
	sudo apt install php8.2-common libapache2-mod-php8.2 php8.2-cli

# - Installing the Laravel Framework -
	composer create-project laravel/laravel 'name' "8.*.*"
		# Replace 'name' with the name of your project
		# We need to use a version below v9, so we put the v8 with the last parameter
	

```