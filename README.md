## Installation

Follow these steps to install and set up your project.

1. **Install Prerequisites:**
   - Run the following commands to install necessary prerequisites:
     ```bash
     sudo apt update
     sudo apt install curl git unzip
     ```

2. **Install PHP:**
   - Laravel requires PHP. You can install it along with some common extensions using:
     ```bash
     sudo apt install php php-cli php-fpm php-json php-common php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath
     ```

3. **Install Composer:**
   - Composer is a PHP dependency manager. You can install it globally with the following commands:
     ```bash
     curl -sS https://getcomposer.org/installer -o composer-setup.php
     sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
     ```

4. **Install a Web Server (e.g., Apache or Nginx):**
   - You can choose either Apache or Nginx. Here's how to install both (choose one):
     - For Apache:
       ```bash
       sudo apt install apache2
       ```
     - For Nginx:
       ```bash
       sudo apt install nginx
       ```

5. **Install MariaDB (or MySQL):**
   - Laravel also needs a database. You can install MariaDB (a MySQL fork) with:
     ```bash
     sudo apt install mariadb-server mariadb-client
     ```

6. **Create a Database:**
   - Log in to your MariaDB/MySQL server and create a database for your Laravel project. Replace `your_database_name`, `your_user`, and `your_password` with appropriate values:
     ```sql
     CREATE DATABASE your_database_name;
     CREATE USER 'your_user'@'localhost' IDENTIFIED BY 'your_password';
     GRANT ALL PRIVILEGES ON your_database_name.* TO 'your_user'@'localhost';
     FLUSH PRIVILEGES;
     ```

7. **Download Laravel:**
   - Navigate to the directory where you want to install Laravel and run the following command to create a new Laravel project. Replace `your_project_name` with your desired project name:
     ```bash
     composer create-project laravel/laravel your_project_name
     ```

8. **Configure Laravel:**
   - Edit the `.env` file and configure your database connection by setting the database name, username, and password you created earlier. Replace the placeholders with your actual values:
     ```bash
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_user
     DB_PASSWORD=your_password
     ```

9. **Set Permissions:**
   - Ensure that your web server user has appropriate permissions to write to certain directories:
     - For Apache:
       ```bash
       sudo chown -R www-data:www-data /var/www/html/your_project_name
       ```
     - For Nginx:
       ```bash
       sudo chown -R www-data:www-data /var/www/your_project_name
       ```

10. **Configure Web Server:**
    - Configure your web server (Apache or Nginx) to serve the Laravel project. Here are the basic configurations for both (choose one):

    - For Apache:
      Create a virtual host configuration file:
      ```apache
      # Add your Apache configuration here
      ```

    - For Nginx:
      Create a server block configuration file:
      ```nginx
      # Add your Nginx configuration here
      ```

11. **Access Your Laravel Project:**
    - Your Laravel project should now be accessible through your server's IP address or domain name in a web browser.

## Usage
1. **Migrate database**
    - Run command
      ```migrate
      php artisan migrate
      ```
2. **Add test users**
    - To add test users you shoul login developer role.
      ```
        # Users have the capability to edit user roles on the admin/user edit page.
        # Additionally, after logging in as a developer role user, users can access the "User Add" menu.
      ```
      
