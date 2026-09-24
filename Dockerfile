FROM php:8.2-apache

# Atualiza e instala dependências de sistema necessárias
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Configura e instala extensões PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    intl \
    gd \
    mysqli \
    pdo_mysql \
    zip \
    opcache

# Habilita módulos do Apache
RUN a2enmod rewrite headers

# Configuração do Apache para apontar DocumentRoot para /public
COPY docker/php/apache.conf /etc/apache2/sites-available/000-default.conf

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Diretório de trabalho
WORKDIR /var/www/html

# Copia o código fonte do projeto
COPY . /var/www/html

# Instala as dependências PHP (ignorando as de dev para produção)
RUN composer install --no-dev --optimize-autoloader

# Cria diretórios essenciais e ajusta permissões
RUN mkdir -p writable/cache writable/logs writable/session writable/uploads writable/debugbar \
    && chmod -R 777 writable \
    && chown -R www-data:www-data /var/www/html

EXPOSE 80
