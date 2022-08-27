## Site Default Digitar

#### Requisitos
- PHP 7.4+
- Composer

#### Passo a passo
1. Copiar o arquivo **.env.example** para o mesmo local com o nome **.env**

2. Atualize as dependências do *PHP* com o comando:
```shell
composer install
```

3. Para baixar as bibliotecas que seram usadas pelas Views:
```shell
npm install
yarn install
```
4. Para gerar a chave de acesso que está no arquivo **.env**:
```shell
php artisan key:generate
```

5. Em caso de sucesso, execute o comando para subir os bancos:
```shell
php artisan migrate
```

6. Agora é necessário subir as seeds para que o site reconheça algumas **foreign_keys**:
```shell
php artisan db:seed --class=UserSeeders
php artisan db:seed --class=EntidadeSeeders
php artisan db:seed --class=SiteSeeders
php artisan db:seed --class=NivelUsersSeeders -- **importante para criar usuários no painel admin**
```



