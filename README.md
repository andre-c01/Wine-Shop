# Wine Shop

- [Wine Shop](#wine-shop)
  - [Structure](#structure)
    - [Models](#models)
    - [Controllers](#controllers)
    - [Views](#views)
    - [Public](#public)
    - [Assets](#assets)
    - [config.php](#configphp)


## Structure

### Models

Aqui fica todas as classes para interagirem com a db

- Carts
- Products
- Stores
- Users

### Controllers

Aqui fica os controladors, eles é que mandam no que acontece com o pedido, por exemplo entre GET e POST acoes diferentes

- About
- Cart
- FrontPage
- Gift
- Product
- Store
- User

### Views

Aqui ficam todo o html (frontend), as views tem acesso a todos os models por isso podem ir buscar informacao a qualquer class (ex: users), para direcionar para uma view usamoso controller com `App::load_view('cart');`

### Public

Esta e assets sao as unicas pastas que o utilizador tem acesso direto e é onde fica o primeiro ficheiro a ser carregado

### Assets

Nesta fica tudo com acesso livre ao utilizador e é onde se coloca scripts, imagens e css

### config.php

Neste ficheiro ficas as variaveis globais do site, por exemplo a base de dados e utilizador