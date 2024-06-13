FROM mysql:8.0

# Set the root password as an environment variable
ENV MYSQL_ROOT_PASSWORD=password

# Add a custom initialization script to the container
COPY docker-database/init.sql /docker-entrypoint-initdb.d/


