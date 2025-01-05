#!/bin/bash
echo "----------------- INSTALLING POSTGRESQL-9.3 ----------------------"
sudo apt-get install -y postgresql-9.3 postgresql-contrib-9.3
echo "----------------- DONE --------------------------"
echo "----------------- CONFIGURING DATABASE ------------------------"
sudo -u postgres psql -c "CREATE USER myuser WITH PASSWORD 'mypass';"
sudo -u postgres psql -c "CREATE DATABASE mydatabase OWNER myuser;"
sudo -u postgres psql -d mydatabase -c "CREATE TABLE users (id SERIAL PRIMARY KEY, name VARCHAR(100), email VARCHAR(100));"
sudo -u postgres psql -c "GRANT ALL PRIVILEGES ON DATABASE mydatabase TO myuser;"
sudo -u postgres psql -d mydatabase -c "GRANT ALL PRIVILEGES ON TABLE users TO myuser;"
sudo -u postgres psql -d mydatabase -c "GRANT USAGE, SELECT ON SEQUENCE users_id_seq TO myuser;"
echo "----------------- DONE --------------------------"
echo "----------------- CREATING CONNECTION --------------------"
sudo sed -i.bck "s/#listen_addresses = 'localhost'/listen_addresses = '*'/" /etc/postgresql/9.3/main/postgresql.conf
sudo sed -i.bck "/^host/ s#127.0.0.1/32#192.168.1.10/32#" /etc/postgresql/9.3/main/pg_hba.conf
sudo ufw allow 5432/tcp
sudo service postgresql restart
echo "----------------- DONE -----------------------"