# LAPP Stack Vagrant Project

This project helps you set up a LAPP (Linux, Apache, PostgreSQL, PHP) stack using Vagrant. It creates a consistent environment for developing and testing web applications.

## Features

- **Web Server**: Installs and sets up Apache and PHP to run dynamic web application.
- **PostgreSQL Database**: Sets up PostgreSQL as the database, creating users and databases.
- **User Interface**: Includes a simple form in PHP to enter data into the PostgreSQL database and show the list of users.
- **Networking**: Uses private networking for communication between virtual machines (VMs).

## Getting Started

1. Install Vagrant and VirtualBox.
2. Clone the repository:

   ```bash
   git clone https://github.com/M-Hamza-dost/Vagrant_project.git
   ```

3. Navigate to the project directory:

   ```bash
   cd Vagrant_project
   ```

4. Start the virtual machines:

   ```bash
   vagrant up
   ```

5. Access the web application at http://192.168.1.10 in your browser.

![Screenshot](https://github.com/M-Hamza-dost/Vagrant_project/blob/main/Screenshot.png)





## Requirements

- Vagrant
- VirtualBox
