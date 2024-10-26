# Practice Test Rodobank - Mathew Vieira Bezerra

## Para executar o Projeto

Com o Makefile e o Docker instalado, executar em qualquer terminal o seguinte comando:

```bash

make setup

```

## Para visualizar no Navegador

Rotas Principais do CRUD API:

<http://localhost:8080/api/transportadoras>
<http://localhost:8080/api/motoristas>
<http://localhost:8080/api/caminhoes>
<http://localhost:8080/api/modelos>

Endpoints e Verbos:

```text


GET|HEAD   api/caminhoes    CaminhaoController@index
POST       api/caminhoes                   ...@store
DELETE     api/caminhoes/removerTodos      ...@destroyAll
GET|HEAD   api/caminhoes/{caminhao}        ...@show
PUT|PATCH  api/caminhoes/{caminhao}        ...@update
DELETE     api/caminhoes/{caminhao}        ...@destroy


GET|HEAD   api/modelos    ModeloController@index
POST       api/modelos                 ...@store
DELETE     api/modelos/removerTodos    ...@destroyAll
GET|HEAD   api/modelos/{modelo}        ...@show
PUT|PATCH  api/modelos/{modelo}        ...@update
DELETE     api/modelos/{modelo}        ...@destroy


GET|HEAD   api/motoristas    MotoristaController@index
POST       api/motoristas                    ...@store
DELETE     api/motoristas/removerTodos       ...@destroyAll
GET|HEAD   api/motoristas/{motorista}        ...@show
PUT|PATCH  api/motoristas/{motorista}        ...@update
DELETE     api/motoristas/{motorista}        ...@destroy


GET|HEAD   api/transportadoras    TransportadoraController@index
POST       api/transportadoras                         ...@store
DELETE     api/transportadoras/removerTodos            ...@destroyAll
GET|HEAD   api/transportadoras/{transportadora}        ...@show
PUT|PATCH  api/transportadoras/{transportadora}        ...@update
DELETE     api/transportadoras/{transportadora}        ...@destroy


```

Visualizar as rotas cadastras:

```bash

php artisan route:list

```

Para compreender mais sobre os Query Parameters, Campos e Formatos dos JSONs,
analisar os Form Requests e Controllers contidos nas seguintes pastas:

```text

app/Http/Controller

```

```text

app/Http/Requests

```
