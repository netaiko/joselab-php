# Debugging with Xdebug and PhpStorm

This project supports step debugging using Xdebug inside Docker.

## Requirements

- PhpStorm
- Xdebug installed and enabled in the container
- PhpStorm listening for debug connections

## PhpStorm server configuration

Go to:

```text
Settings > PHP > Servers
```

Create a server with the following values:

- Name: `joselab-php`
- Host: `localhost`
- Port: `80`
- Debugger: `Xdebug`

Enable **Use path mappings** and configure:

```text
Local path:  <your-project-path>
Remote path: /var/www
```

Example:

```text
C:\www\joselab-php -> /var/www
```

## PhpStorm debug listener

In PhpStorm:

- Start listening for PHP debug connections
- Ensure the Xdebug port is `9003`

You can check the port in:

```text
Settings > PHP > Debug
```

## Docker configuration notes

The Docker service should define the server name so PhpStorm can match the incoming Xdebug session correctly.

Example:

```yaml
environment:
  PHP_IDE_CONFIG: "serverName=joselab-php"
```

Xdebug configuration typically includes:

```ini
xdebug.mode = debug,develop
xdebug.start_with_request = yes
xdebug.client_host = host.docker.internal
xdebug.client_port = 9003
xdebug.idekey = PHPSTORM
```

## Running a script with debugging

Run the CLI script as usual:

```bash
docker compose exec app php bin/run.php
```

If everything is configured correctly, breakpoints should be hit automatically.

## Debugging PHPUnit tests

You can also debug test execution:

```bash
docker compose exec app vendor/bin/phpunit
```

Breakpoints may be placed in both:

- `src/`
- `tests/`

## Troubleshooting

Check that Xdebug is loaded:

```bash
docker compose exec app php -v
```

Check that the container can resolve the host:

```bash
docker compose exec app getent hosts host.docker.internal
```

Check Xdebug configuration values:

```bash
docker compose exec app php -i | grep -i xdebug
```

Inspect the Xdebug log if needed:

```bash
docker compose exec app cat /tmp/xdebug.log
```

## Common issues

### Breakpoints are not hit

Usually caused by one of these:

- incorrect path mapping in PhpStorm
- server name in PhpStorm does not match `PHP_IDE_CONFIG`
- PhpStorm is not listening for debug connections
- Xdebug is not loaded in the container

### Xdebug connects but PhpStorm cannot find the file

This is usually a path mapping issue.

For this project, the expected mapping is:

```text
C:\www\joselab-php -> /var/www
```