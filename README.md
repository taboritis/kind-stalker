## Installation and configuration

### 0. Documentation
[OpenAPI Specification](https://github.com/taboritis/kind-stalker/blob/main/storage/api-docs/openapi.yaml)


### 1. Clone the repository

```bash
git clone git@github.com:taboritis/kind-stalker.git
```

### 2. Install dependencies

```bash
cd kind-stalker
composer install --no-dev
```

3. Create a `.env` and update credentials

```bash
cp .env.example .env
php artisan key:generate
```

```dotenv
BASIC_AUTH_USERNAME=your_name,
BASIC_AUTH_PASSWORD=your_password
```

### 4. Copy to your http server 
```bash
# zip file
zip -r kind-stalker.zip .

# copy to server
scp kind-stalker.zip user@server:/path/to/your/http/server

# unzip on server

# have a fun
```
