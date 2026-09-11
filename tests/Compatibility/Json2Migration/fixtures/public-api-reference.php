<?php

declare(strict_types=1);

return array(
  'reference' => '2a6dfb8cc44a4d00867b5c9925061f7e9f05c9f2',
  'interfaces' =>
  array(
    0 => 'FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface',
    1 => 'FluxSE\\OdooApiClient\\Api\\FaultInterface',
    2 => 'FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface',
    3 => 'FluxSE\\OdooApiClient\\Api\\RequestBodyInterface',
    4 => 'FluxSE\\OdooApiClient\\Builder\\OdooApiClientBuilderInterface',
    5 => 'FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface',
    6 => 'FluxSE\\OdooApiClient\\Manager\\ModelListManagerInterface',
    7 => 'FluxSE\\OdooApiClient\\Manager\\ModelManagerInterface',
    8 => 'FluxSE\\OdooApiClient\\Model\\BaseInterface',
    9 => 'FluxSE\\OdooApiClient\\Model\\Object\\BaseObjectInterface',
    10 => 'FluxSE\\OdooApiClient\\Model\\OdooAwareInterface',
    11 => 'FluxSE\\OdooApiClient\\Operations\\CommonOperationsInterface',
    12 => 'FluxSE\\OdooApiClient\\Operations\\DbOperationsInterface',
    13 => 'FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface',
    14 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface',
    15 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface',
    16 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface',
    17 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\InspectionOperationsInterface',
    18 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface',
    19 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptionsInterface',
    20 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface',
    21 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface',
    22 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface',
    23 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface',
    24 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface',
    25 => 'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperationsInterface',
    26 => 'FluxSE\\OdooApiClient\\Operations\\OperationsInterface',
    27 => 'FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\ModelFixerInterface',
    28 => 'FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverterInterface',
    29 => 'FluxSE\\OdooApiClient\\Provider\\ModelFieldsProviderInterface',
    30 => 'FluxSE\\OdooApiClient\\Serializer\\Factory\\SerializerFactoryInterface',
    31 => 'FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcSerializerHelperInterface',
    32 => 'FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface',
    33 => 'FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcSerializerHelperInterface',
  ),
  'symbols' =>
  array(
    'FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactory' => 'class final FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactory
parent=-
interfaces=FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface
traits=
public __construct(string $className):-
public create(string $method):FluxSE\\OdooApiClient\\Api\\RequestBodyInterface',
    'FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface' => 'interface abstract FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface
parent=-
interfaces=
traits=
public abstract create(string $method):FluxSE\\OdooApiClient\\Api\\RequestBodyInterface',
    'FluxSE\\OdooApiClient\\Api\\Fault' => 'class final FluxSE\\OdooApiClient\\Api\\Fault
parent=-
interfaces=FluxSE\\OdooApiClient\\Api\\FaultInterface
traits=
public __construct(int $faultCode,string $faultString):-
public getFaultCode():int
public getFaultString():string',
    'FluxSE\\OdooApiClient\\Api\\FaultInterface' => 'interface abstract FluxSE\\OdooApiClient\\Api\\FaultInterface
parent=-
interfaces=
traits=
public abstract getFaultCode():int
public abstract getFaultString():string',
    'FluxSE\\OdooApiClient\\Api\\JsonFault' => 'class final FluxSE\\OdooApiClient\\Api\\JsonFault
parent=-
interfaces=FluxSE\\OdooApiClient\\Api\\FaultInterface
traits=
public __construct(int $code,string $message,array $data):-
public getFaultCode():int
public getFaultString():string',
    'FluxSE\\OdooApiClient\\Api\\OdooApiRequestMaker' => 'class final FluxSE\\OdooApiClient\\Api\\OdooApiRequestMaker
parent=-
interfaces=FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface
traits=
public __construct(Psr\\Http\\Client\\ClientInterface $httpClient,Psr\\Http\\Message\\RequestFactoryInterface $requestFactory,Psr\\Http\\Message\\UriInterface $baseUri):-
public getBaseUri():Psr\\Http\\Message\\UriInterface
public getHttpClient():Psr\\Http\\Client\\ClientInterface
public getLastResponse():?Psr\\Http\\Message\\ResponseInterface
public getRequestFactory():Psr\\Http\\Message\\RequestFactoryInterface
public isJsonRpc():bool
public isXmlRpc():bool
public request(string $operationPath,Psr\\Http\\Message\\StreamInterface $body):Psr\\Http\\Message\\ResponseInterface
public setBaseUri(Psr\\Http\\Message\\UriInterface $baseUri):void',
    'FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface' => 'interface abstract FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface
parent=-
interfaces=
traits=
const public BASE_JSONRPC_PATH=s:7:"jsonrpc";
const public BASE_XMLRPC_PATH=s:8:"xmlrpc/2";
public abstract getBaseUri():Psr\\Http\\Message\\UriInterface
public abstract getHttpClient():Psr\\Http\\Client\\ClientInterface
public abstract getLastResponse():?Psr\\Http\\Message\\ResponseInterface
public abstract getRequestFactory():Psr\\Http\\Message\\RequestFactoryInterface
public abstract isJsonRpc():bool
public abstract isXmlRpc():bool
public abstract request(string $operationPath,Psr\\Http\\Message\\StreamInterface $body):Psr\\Http\\Message\\ResponseInterface
public abstract setBaseUri(Psr\\Http\\Message\\UriInterface $baseUri):void',
    'FluxSE\\OdooApiClient\\Api\\RequestBody' => 'class final FluxSE\\OdooApiClient\\Api\\RequestBody
parent=-
interfaces=FluxSE\\OdooApiClient\\Api\\RequestBodyInterface
traits=
public __construct(string $method):-
public getMethod():string
public getParams():array
public setJsonParams(string $service,string $method,array $args):void
public setMethod(string $method):void
public setParams(array $params):void',
    'FluxSE\\OdooApiClient\\Api\\RequestBodyInterface' => 'interface abstract FluxSE\\OdooApiClient\\Api\\RequestBodyInterface
parent=-
interfaces=
traits=
public abstract getMethod():string
public abstract getParams():array
public abstract setJsonParams(string $service,string $method,array $args):void
public abstract setMethod(string $method):void
public abstract setParams(array $params):void',
    'FluxSE\\OdooApiClient\\Builder\\OdooApiClientBuilder' => 'class final FluxSE\\OdooApiClient\\Builder\\OdooApiClientBuilder
parent=-
interfaces=FluxSE\\OdooApiClient\\Builder\\OdooApiClientBuilderInterface
traits=
public __construct(string $baseHostname,string $basePath=s:7:"jsonrpc";):-
public buildApiRequestMaker():FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface
public buildBaseUri():Psr\\Http\\Message\\UriInterface
public buildCommonOperations():FluxSE\\OdooApiClient\\Operations\\CommonOperationsInterface
public buildDbOperations():FluxSE\\OdooApiClient\\Operations\\DbOperationsInterface
public buildExecuteKwOperations(string $className,string $database,string $username,string $password):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface
public buildHttpClient():Psr\\Http\\Client\\ClientInterface
public buildObjectOperations(string $database,string $username,string $password):FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface
public buildOdooHttpClientFactory():FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface
public buildOperations(string $className):FluxSE\\OdooApiClient\\Operations\\OperationsInterface
public buildRequestBodyFactory():FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface
public buildRpcSerializerHelper():FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
public buildSerializer():Symfony\\Component\\Serializer\\Serializer
public getBaseHostname():string
public getBasePath():string
public setBaseHostname(string $baseHostname):void
public setBasePath(string $basePath):void
public setHttpClient(?Psr\\Http\\Client\\ClientInterface $httpClient):void
public setOdooApiRequestMaker(FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface $odooApiRequestMaker):void
public setOdooHttpClientFactory(FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface $odooHttpClientFactory):void
public setRequestBodyFactory(?FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface $requestBodyFactory):void
public setRpcSerializerHelper(?FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface $rpcSerializerHelper):void
public setSerializer(?Symfony\\Component\\Serializer\\Serializer $serializer):void',
    'FluxSE\\OdooApiClient\\Builder\\OdooApiClientBuilderInterface' => 'interface abstract FluxSE\\OdooApiClient\\Builder\\OdooApiClientBuilderInterface
parent=-
interfaces=
traits=
public abstract buildApiRequestMaker():FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface
public abstract buildBaseUri():Psr\\Http\\Message\\UriInterface
public abstract buildCommonOperations():FluxSE\\OdooApiClient\\Operations\\CommonOperationsInterface
public abstract buildDbOperations():FluxSE\\OdooApiClient\\Operations\\DbOperationsInterface
public abstract buildExecuteKwOperations(string $className,string $database,string $username,string $password):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface
public abstract buildHttpClient():Psr\\Http\\Client\\ClientInterface
public abstract buildObjectOperations(string $database,string $username,string $password):FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface
public abstract buildOdooHttpClientFactory():FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface
public abstract buildOperations(string $className):FluxSE\\OdooApiClient\\Operations\\OperationsInterface
public abstract buildRequestBodyFactory():FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface
public abstract buildRpcSerializerHelper():FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
public abstract buildSerializer():Symfony\\Component\\Serializer\\Serializer
public abstract getBaseHostname():string
public abstract getBasePath():string
public abstract setBaseHostname(string $baseHostname):void
public abstract setBasePath(string $basePath):void
public abstract setHttpClient(?Psr\\Http\\Client\\ClientInterface $httpClient):void
public abstract setOdooApiRequestMaker(FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface $odooApiRequestMaker):void
public abstract setOdooHttpClientFactory(FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface $odooHttpClientFactory):void
public abstract setRequestBodyFactory(?FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface $requestBodyFactory):void
public abstract setRpcSerializerHelper(?FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface $rpcSerializerHelper):void
public abstract setSerializer(?Symfony\\Component\\Serializer\\Serializer $serializer):void',
    'FluxSE\\OdooApiClient\\Command\\GeneratorCommand' => 'class final FluxSE\\OdooApiClient\\Command\\GeneratorCommand
parent=Symfony\\Component\\Console\\Command\\Command
interfaces=Symfony\\Component\\Console\\Command\\SignalableCommandInterface
traits=
public __construct(FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface $objectOperations,FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverterInterface $odooModelsStructureConverter,Prometee\\PhpClassGenerator\\PhpGeneratorInterface $phpClassesGenerator,?string $name=N;):-
protected configure():void
protected execute(Symfony\\Component\\Console\\Input\\InputInterface $input,Symfony\\Component\\Console\\Output\\OutputInterface $output):int',
    'FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactory' => 'class final FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactory
parent=-
interfaces=FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface
traits=
public __construct(FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface $rpcSerializerHelper):-
public buildPlugins():array
public create():Psr\\Http\\Client\\ClientInterface
public getRpcSerializerHelper():FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
public setupContentTypePlugin():Http\\Client\\Common\\Plugin
public setupErrorPlugin():Http\\Client\\Common\\Plugin
public setupLoggerPlugin():Http\\Client\\Common\\Plugin',
    'FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface' => 'interface abstract FluxSE\\OdooApiClient\\HttpClient\\Factory\\OdooHttpClientFactoryInterface
parent=-
interfaces=
traits=
public abstract buildPlugins():array
public abstract create():Psr\\Http\\Client\\ClientInterface
public abstract getRpcSerializerHelper():FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
public abstract setupContentTypePlugin():?Http\\Client\\Common\\Plugin
public abstract setupErrorPlugin():?Http\\Client\\Common\\Plugin
public abstract setupLoggerPlugin():?Http\\Client\\Common\\Plugin',
    'FluxSE\\OdooApiClient\\HttpClient\\Plugin\\OdooApiErrorPlugin' => 'class final FluxSE\\OdooApiClient\\HttpClient\\Plugin\\OdooApiErrorPlugin
parent=-
interfaces=Http\\Client\\Common\\Plugin
traits=
public __construct(Http\\Client\\Common\\Plugin $errorPluginDecorated,FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface $rpcSerializerHelper):-
public handleRequest(Psr\\Http\\Message\\RequestInterface $request,callable $next,callable $first):Http\\Promise\\Promise',
    'FluxSE\\OdooApiClient\\Manager\\ModelListManager' => 'class final FluxSE\\OdooApiClient\\Manager\\ModelListManager
parent=-
interfaces=FluxSE\\OdooApiClient\\Manager\\ModelListManagerInterface
traits=
public __construct(Symfony\\Component\\Serializer\\Serializer $serializer,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface $recordListOperations,FluxSE\\OdooApiClient\\Provider\\ModelFieldsProviderInterface $modelFieldsProvider):-
public count(string $className,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;):int
public find(string $className,int $id,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface $readOptions=N;):?FluxSE\\OdooApiClient\\Model\\BaseInterface
public findBy(string $className,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface $searchReadOptions=N;):array
public findByIds(string $className,array $ids,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface $readOptions=N;):array
public findOneBy(string $className,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface $searchReadOptions=N;):?FluxSE\\OdooApiClient\\Model\\BaseInterface
public getRecordListOperations():FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface
public getSerializer():Symfony\\Component\\Serializer\\Serializer',
    'FluxSE\\OdooApiClient\\Manager\\ModelListManagerInterface' => 'interface abstract FluxSE\\OdooApiClient\\Manager\\ModelListManagerInterface
parent=-
interfaces=
traits=
public abstract count(string $className,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;):int
public abstract find(string $className,int $id,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface $readOptions=N;):?FluxSE\\OdooApiClient\\Model\\BaseInterface
public abstract findBy(string $className,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface $searchReadOptions=N;):array
public abstract findByIds(string $className,array $ids,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface $readOptions=N;):array
public abstract findOneBy(string $className,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface $searchReadOptions=N;):?FluxSE\\OdooApiClient\\Model\\BaseInterface
public abstract getRecordListOperations():FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface
public abstract getSerializer():Symfony\\Component\\Serializer\\Serializer',
    'FluxSE\\OdooApiClient\\Manager\\ModelManager' => 'class final FluxSE\\OdooApiClient\\Manager\\ModelManager
parent=-
interfaces=FluxSE\\OdooApiClient\\Manager\\ModelManagerInterface
traits=
public __construct(Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface $normalizer,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperationsInterface $recordOperations):-
public delete(FluxSE\\OdooApiClient\\Model\\BaseInterface $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool
public getNormalizer():Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface
public getRecordOperations():FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperationsInterface
public persist(FluxSE\\OdooApiClient\\Model\\BaseInterface $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):int
public update(FluxSE\\OdooApiClient\\Model\\BaseInterface $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool',
    'FluxSE\\OdooApiClient\\Manager\\ModelManagerInterface' => 'interface abstract FluxSE\\OdooApiClient\\Manager\\ModelManagerInterface
parent=-
interfaces=
traits=
public abstract delete(FluxSE\\OdooApiClient\\Model\\BaseInterface $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool
public abstract getNormalizer():Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface
public abstract getRecordOperations():FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperationsInterface
public abstract persist(FluxSE\\OdooApiClient\\Model\\BaseInterface $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):int
public abstract update(FluxSE\\OdooApiClient\\Model\\BaseInterface $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool',
    'FluxSE\\OdooApiClient\\Model\\BaseInterface' => 'interface abstract FluxSE\\OdooApiClient\\Model\\BaseInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Model\\Object\\BaseObjectInterface,FluxSE\\OdooApiClient\\Model\\OdooAwareInterface
traits=',
    'FluxSE\\OdooApiClient\\Model\\Common\\Version' => 'class final FluxSE\\OdooApiClient\\Model\\Common\\Version
parent=-
interfaces=
traits=
public __construct(string $server_version,array $server_version_info,string $server_serie,int $protocol_version):-
public getProtocolVersion():int
public getServerSerie():string
public getServerVersion():string
public getServerVersionInfo():array',
    'FluxSE\\OdooApiClient\\Model\\Object\\AbstractBase' => 'class abstract FluxSE\\OdooApiClient\\Model\\Object\\AbstractBase
parent=-
interfaces=FluxSE\\OdooApiClient\\Model\\Object\\BaseObjectInterface
traits=
property protected $display_name:?string=N;
property protected $id:int|false|null=N;
public getDisplayName():?string
public getId():int|false|null
public setDisplayName(?string $display_name):void
public setId(int|false|null $id):void',
    'FluxSE\\OdooApiClient\\Model\\Object\\BaseObjectInterface' => 'interface abstract FluxSE\\OdooApiClient\\Model\\Object\\BaseObjectInterface
parent=-
interfaces=
traits=
public abstract getDisplayName():?string
public abstract getId():int|false|null
public abstract setDisplayName(?string $display_name):void',
    'FluxSE\\OdooApiClient\\Model\\OdooAwareInterface' => 'interface abstract FluxSE\\OdooApiClient\\Model\\OdooAwareInterface
parent=-
interfaces=
traits=
public abstract static getOdooModelName():string',
    'FluxSE\\OdooApiClient\\Model\\OdooRelation' => 'class final FluxSE\\OdooApiClient\\Model\\OdooRelation
parent=FluxSE\\OdooApiClient\\Model\\Object\\AbstractBase
interfaces=FluxSE\\OdooApiClient\\Model\\Object\\BaseObjectInterface
traits=
const public COMMAND_ADD=i:0;
const public COMMAND_ADD_EXISTING=i:4;
const public COMMAND_REMOVE_ALL=i:5;
const public COMMAND_REMOVE_ID=i:3;
const public COMMAND_REMOVE_ID_CASCADE=i:2;
const public COMMAND_REPLACE_ALL=i:6;
const public COMMAND_UPDATE=i:1;
public __construct(int|false|null $id=N;,?string $display_name=N;):-
public buildAdd(FluxSE\\OdooApiClient\\Model\\BaseInterface $embed_model):void
public buildAddExisting(int $id):void
public buildRemoveAll():void
public buildRemoveId(int $id):void
public buildRemoveIdCascade(int $id):void
public buildReplaceAll(array $ids):void
public buildUpdate(int $id,FluxSE\\OdooApiClient\\Model\\BaseInterface $embed_model):void
public getCommand():?int
public getCommandId():?int
public getEmbedModel():?FluxSE\\OdooApiClient\\Model\\BaseInterface
public getReplaceIds():array
public setCommand(?int $command):void
public setCommandId(?int $commandId):void
public setEmbedModel(?FluxSE\\OdooApiClient\\Model\\BaseInterface $embed_model):void
public setReplaceIds(array $replace_ids):void',
    'FluxSE\\OdooApiClient\\Operations\\AbstractOperations' => 'class abstract FluxSE\\OdooApiClient\\Operations\\AbstractOperations
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\OperationsInterface
traits=
property protected $apiRequestMaker:FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface
property protected $requestBodyFactory:FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface
property protected $rpcSerializerHelper:FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
public __construct(FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface $apiRequestMaker,FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface $requestBodyFactory,FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface $rpcSerializerHelper):-
public decode(Psr\\Http\\Message\\ResponseInterface $response):array
public deserializeArrayOfString(Psr\\Http\\Message\\ResponseInterface $response):array
public deserializeBoolean(Psr\\Http\\Message\\ResponseInterface $response):bool
public deserializeInteger(Psr\\Http\\Message\\ResponseInterface $response):int
public deserializeModel(Psr\\Http\\Message\\ResponseInterface $response,string $model):-
public deserializeString(Psr\\Http\\Message\\ResponseInterface $response):string
public getApiRequestMaker():FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface
public getRequestBodyFactory():FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface
public getRpcSerializerHelper():FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
public getService():string
protected jsonRpcRequest(string $method,array $params=a:0:{}):Psr\\Http\\Message\\ResponseInterface
public request(string $method,array $params=a:0:{}):Psr\\Http\\Message\\ResponseInterface
protected xmlRpcRequest(string $method,array $params=a:0:{}):Psr\\Http\\Message\\ResponseInterface',
    'FluxSE\\OdooApiClient\\Operations\\CommonOperations' => 'class final FluxSE\\OdooApiClient\\Operations\\CommonOperations
parent=FluxSE\\OdooApiClient\\Operations\\AbstractOperations
interfaces=FluxSE\\OdooApiClient\\Operations\\OperationsInterface,FluxSE\\OdooApiClient\\Operations\\CommonOperationsInterface
traits=
public about():string
public aboutExtended():array
public authenticate(string $database,string $username,string $password,array $userAgentEnv=a:0:{}):int
public getEndpointPath():string
public version():FluxSE\\OdooApiClient\\Model\\Common\\Version',
    'FluxSE\\OdooApiClient\\Operations\\CommonOperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\CommonOperationsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\OperationsInterface
traits=
public abstract about():string
public abstract aboutExtended():array
public abstract authenticate(string $database,string $username,string $password,array $userAgentEnv=a:0:{}):int
public abstract version():FluxSE\\OdooApiClient\\Model\\Common\\Version',
    'FluxSE\\OdooApiClient\\Operations\\DbOperations' => 'class final FluxSE\\OdooApiClient\\Operations\\DbOperations
parent=FluxSE\\OdooApiClient\\Operations\\AbstractOperations
interfaces=FluxSE\\OdooApiClient\\Operations\\OperationsInterface,FluxSE\\OdooApiClient\\Operations\\DbOperationsInterface
traits=
public change_admin_password(string $masterPassword,string $newPassword):bool
public create_database(string $masterPassword,string $dbName,string $demo,string $lang,string $serPassword=s:5:"admin";,string $login=s:5:"admin";,?string $countryCode=N;,?string $phone=N;):array
public db_exist(string $dbName):bool
public drop(string $masterPassword,string $dbName):bool
public dump(string $masterPassword,string $dbName,string $format=s:3:"zip";):string
public duplicate_database(string $masterPassword,string $dbOriginalName,string $dbName):bool
public getEndpointPath():string
public list(bool $document=b:0;):array
public list_countries(string $masterPassword):array
public list_lang():array
public migrate_databases(string $masterPassword,array $databases):bool
public rename(string $masterPassword,string $oldName,string $newName):bool
public restore(string $masterPassword,string $dbName,string $data,bool $copy=b:0;):bool
public server_version():string',
    'FluxSE\\OdooApiClient\\Operations\\DbOperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\DbOperationsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\OperationsInterface
traits=
public abstract change_admin_password(string $masterPassword,string $newPassword):bool
public abstract create_database(string $masterPassword,string $dbName,string $demo,string $lang,string $serPassword=s:5:"admin";,string $login=s:5:"admin";,?string $countryCode=N;,?string $phone=N;):array
public abstract db_exist(string $dbName):bool
public abstract drop(string $masterPassword,string $dbName):bool
public abstract dump(string $masterPassword,string $dbName,string $format=s:3:"zip";):string
public abstract duplicate_database(string $masterPassword,string $dbOriginalName,string $dbName):bool
public abstract list(bool $document=b:0;):array
public abstract list_countries(string $masterPassword):array
public abstract list_lang():array
public abstract migrate_databases(string $masterPassword,array $databases):bool
public abstract rename(string $masterPassword,string $oldName,string $newName):bool
public abstract restore(string $masterPassword,string $dbName,string $data,bool $copy=b:0;):bool
public abstract server_version():string',
    'FluxSE\\OdooApiClient\\Operations\\Exception\\AuthenticationFailedException' => 'class final FluxSE\\OdooApiClient\\Operations\\Exception\\AuthenticationFailedException
parent=Exception
interfaces=Throwable,Stringable
traits=',
    'FluxSE\\OdooApiClient\\Operations\\ObjectOperations' => 'class final FluxSE\\OdooApiClient\\Operations\\ObjectOperations
parent=FluxSE\\OdooApiClient\\Operations\\AbstractOperations
interfaces=FluxSE\\OdooApiClient\\Operations\\OperationsInterface,FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface
traits=
public __construct(string $database,string $username,string $password,FluxSE\\OdooApiClient\\Operations\\CommonOperationsInterface $commonOperations):-
public execute_kw(string $modelName,string $methodName,array $arguments=a:0:{},array $options=a:0:{}):Psr\\Http\\Message\\ResponseInterface
public getDatabase():string
public getEndpointPath():string
public getPassword():string
public getUsername():string
public retrieveUid():int
public setDatabase(string $database):void
public setPassword(string $password):void
public setUsername(string $username):void',
    'FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\OperationsInterface
traits=
public abstract execute_kw(string $modelName,string $methodName,array $arguments=a:0:{},array $options=a:0:{}):Psr\\Http\\Message\\ResponseInterface
public abstract getDatabase():string
public abstract getPassword():string
public abstract getUsername():string
public abstract retrieveUid():int
public abstract setDatabase(string $database):void
public abstract setPassword(string $password):void
public abstract setUsername(string $username):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\AbstractOperations' => 'class abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\AbstractOperations
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface
traits=
public __construct(FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface $objectOperations):-
public execute_kw(string $modelName,string $methodName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface $arguments=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):Psr\\Http\\Message\\ResponseInterface
public execute_kw_action(string $modelName,string $actionName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface $arguments=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):array|string|int|bool
public getObjectOperations():FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\AbstractArguments' => 'class abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\AbstractArguments
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface
traits=
property protected $arguments:array=a:0:{}
public addArgument(array|string|int|float|bool|null $argument):void
public getArguments():array
public setArguments(array $arguments):void
public toArray():array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\Arguments' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\Arguments
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\AbstractArguments
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface
traits=',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface
parent=-
interfaces=
traits=
public abstract addArgument(array|string|int|float|bool|null $argument):void
public abstract getArguments():array
public abstract setArguments(array $arguments):void
public abstract toArray():array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\Criterion' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\Criterion
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
traits=
public static and(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static child_of(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static equal_ilike(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static equal_like(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static greater_than(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static greater_than_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static ilike(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static in(string $fieldName,array $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static less_than(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static less_than_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static like(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static not(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static not_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static not_ilike(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static not_in(string $fieldName,array $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static not_like(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static or(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public static parent_of(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public toArray():array
public static unset_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
parent=-
interfaces=
traits=
const public LOGIC_AND=s:1:"&";
const public LOGIC_NOT=s:1:"!";
const public LOGIC_OR=s:1:"|";
const public OPERATOR_CHILD_OF=s:8:"child_of";
const public OPERATOR_EQUAL=s:1:"=";
const public OPERATOR_EQUAL_ILIKE=s:6:"=ilike";
const public OPERATOR_EQUAL_LIKE=s:5:"=like";
const public OPERATOR_GREATER_THAN=s:1:">";
const public OPERATOR_GREATER_THAN_EQUAL=s:2:">=";
const public OPERATOR_ILIKE=s:5:"ilike";
const public OPERATOR_IN=s:2:"in";
const public OPERATOR_LESS_THAN=s:1:"<";
const public OPERATOR_LESS_THAN_EQUAL=s:2:"<=";
const public OPERATOR_LIKE=s:4:"like";
const public OPERATOR_NOT_EQUAL=s:2:"!=";
const public OPERATOR_NOT_ILIKE=s:9:"not ilike";
const public OPERATOR_NOT_IN=s:6:"not in";
const public OPERATOR_NOT_LIKE=s:8:"not like";
const public OPERATOR_PARENT_OF=s:9:"parent_of";
const public OPERATOR_UNSET_EQUAL=s:2:"=?";
public abstract static and(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static child_of(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static equal_ilike(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static equal_like(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static greater_than(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static greater_than_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static ilike(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static in(string $fieldName,array $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static less_than(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static less_than_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static like(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static not(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static not_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static not_ilike(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static not_in(string $fieldName,array $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static not_like(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static or(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract static parent_of(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface
public abstract toArray():array
public abstract static unset_equal(string $fieldName,string|int|float|bool $value):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomains' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomains
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\AbstractArguments
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
traits=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsTrait
public addAndCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public addCriterion(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public addNotCriterion(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public addOrCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
protected buildCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public toArray():array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface
traits=
public abstract addAndCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public abstract addCriterion(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public abstract addNotCriterion(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public abstract addOrCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsTrait' => 'trait abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsTrait
parent=-
interfaces=
traits=
public addAndCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public addCriterion(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public addNotCriterion(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
public addOrCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c1,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c2):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface
protected abstract buildCriteria(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\CriterionInterface $c):FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\InspectionOperations' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\InspectionOperations
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\AbstractOperations
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\InspectionOperationsInterface
traits=
public fields_get(string $modelName,array $fields=a:0:{},?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptionsInterface $fieldsGetOptions=N;):array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\InspectionOperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\InspectionOperationsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface
traits=
public abstract fields_get(string $modelName,array $fields=a:0:{},?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptionsInterface $fieldsGetOptions=N;):array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface
parent=-
interfaces=
traits=
public abstract execute_kw(string $modelName,string $methodName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface $arguments=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):Psr\\Http\\Message\\ResponseInterface
public abstract execute_kw_action(string $modelName,string $actionName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\ArgumentsInterface $arguments=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):array|string|int|bool
public abstract getObjectOperations():FluxSE\\OdooApiClient\\Operations\\ObjectOperationsInterface',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\AbstractOptions' => 'class abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\AbstractOptions
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface
traits=
public addOption(string $name,array|string|int|float|bool|null $option):void
public getOption(string $name):array|string|int|float|bool|null
public getOptions():array
public removeOption(string $name):void
public setOptions(array $options):void
public toArray():array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptions' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptions
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\AbstractOptions
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptionsInterface
traits=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetTrait
public __construct():-
public addAttribute(string $attribute):bool
public getAttributes():array
public hasAttribute(string $attribute):bool
public removeAttribute(string $attribute):bool
public setAttributes(array $attributes):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptionsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetOptionsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface
traits=
const public FIELD_NAME_ATTRIBUTES=s:10:"attributes";
public abstract addAttribute(string $attribute):bool
public abstract getAttributes():array
public abstract hasAttribute(string $attribute):bool
public abstract removeAttribute(string $attribute):bool
public abstract setAttributes(array $attributes):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetTrait' => 'trait FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\FieldsGetTrait
parent=-
interfaces=
traits=
public __construct():-
public addAttribute(string $attribute):bool
public getAttributes():array
public hasAttribute(string $attribute):bool
public removeAttribute(string $attribute):bool
public setAttributes(array $attributes):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\Options' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\Options
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\AbstractOptions
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface
traits=',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface
parent=-
interfaces=
traits=
public abstract addOption(string $name,array|string|int|float|bool|null $option):void
public abstract getOption(string $name):array|string|int|float|bool|null
public abstract getOptions():array
public abstract removeOption(string $name):void
public abstract setOptions(array $options):void
public abstract toArray():array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptions' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptions
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\AbstractOptions
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface
traits=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsTrait
public __construct():-
public addField(string $field):bool
public getFields():array
public hasField(string $field):bool
public removeField(string $field):bool
public setFields(array $fields):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface
traits=
const public FIELD_NAME_FIELDS=s:6:"fields";
public abstract addField(string $field):bool
public abstract getFields():array
public abstract hasField(string $field):bool
public abstract removeField(string $field):bool
public abstract setFields(array $fields):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsTrait' => 'trait FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsTrait
parent=-
interfaces=
traits=
public __construct():-
public addField(string $field):bool
public getFields():array
public hasField(string $field):bool
public removeField(string $field):bool
public setFields(array $fields):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptions' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptions
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\AbstractOptions
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface
traits=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsTrait
public __construct():-
public getLimit():?int
public getOffset():int
public getOrder():?string
public setLimit(?int $limit):void
public setOffset(int $offset):void
public setOrder(?string $order):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface
traits=
const public FIELD_NAME_LIMIT=s:5:"limit";
const public FIELD_NAME_OFFSET=s:6:"offset";
const public FIELD_NAME_ORDER=s:5:"order";
public abstract getLimit():?int
public abstract getOffset():int
public abstract getOrder():?string
public abstract setLimit(?int $limit):void
public abstract setOffset(int $offset):void
public abstract setOrder(?string $order):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsTrait' => 'trait FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsTrait
parent=-
interfaces=
traits=
public __construct():-
public getLimit():?int
public getOffset():int
public getOrder():?string
public setLimit(?int $limit):void
public setOffset(int $offset):void
public setOrder(?string $order):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptions' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptions
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\AbstractOptions
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface
traits=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsTrait,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsTrait
public __construct():-
public addField(string $field):bool
public getFields():array
public getLimit():?int
public getOffset():int
public getOrder():?string
public hasField(string $field):bool
public removeField(string $field):bool
public setFields(array $fields):void
public setLimit(?int $limit):void
public setOffset(int $offset):void
public setOrder(?string $order):void',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface
traits=',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperations' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperations
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\AbstractOperations
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface
traits=
public read(string $modelName,array $ids=a:0:{},?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface $readOptions=N;):array
public search(string $modelName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface $searchOptions=N;):array
public search_count(string $modelName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface $searchOptions=N;):int
public search_read(string $modelName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface $searchReadOptions=N;):array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface
traits=
public abstract read(string $modelName,array $ids=a:0:{},?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\ReadOptionsInterface $readOptions=N;):array
public abstract search(string $modelName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface $searchOptions=N;):array
public abstract search_count(string $modelName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchOptionsInterface $searchOptions=N;):int
public abstract search_read(string $modelName,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\SearchReadOptionsInterface $searchReadOptions=N;):array',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperations' => 'class final FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperations
parent=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\AbstractOperations
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperationsInterface
traits=
public create(string $modelName,array $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):int
public unlink(string $modelName,array $ids,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool
public write(string $modelName,array $ids,array $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool',
    'FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordOperationsInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\OperationsInterface
traits=
public abstract create(string $modelName,array $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):int
public abstract unlink(string $modelName,array $ids,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool
public abstract write(string $modelName,array $ids,array $model,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Options\\OptionsInterface $options=N;):bool',
    'FluxSE\\OdooApiClient\\Operations\\OperationsInterface' => 'interface abstract FluxSE\\OdooApiClient\\Operations\\OperationsInterface
parent=-
interfaces=
traits=
public abstract decode(Psr\\Http\\Message\\ResponseInterface $response):array
public abstract deserializeArrayOfString(Psr\\Http\\Message\\ResponseInterface $response):array
public abstract deserializeBoolean(Psr\\Http\\Message\\ResponseInterface $response):bool
public abstract deserializeInteger(Psr\\Http\\Message\\ResponseInterface $response):int
public abstract deserializeModel(Psr\\Http\\Message\\ResponseInterface $response,string $model):-
public abstract deserializeString(Psr\\Http\\Message\\ResponseInterface $response):string
public abstract getApiRequestMaker():FluxSE\\OdooApiClient\\Api\\OdooApiRequestMakerInterface
public abstract getEndpointPath():string
public abstract getRequestBodyFactory():FluxSE\\OdooApiClient\\Api\\Factory\\RequestBodyFactoryInterface
public abstract getRpcSerializerHelper():FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
public abstract getService():string
public abstract request(string $method,array $params=a:0:{}):Psr\\Http\\Message\\ResponseInterface',
    'FluxSE\\OdooApiClient\\PhpGenerator\\Builder\\SerializableClassBuilder' => 'class final FluxSE\\OdooApiClient\\PhpGenerator\\Builder\\SerializableClassBuilder
parent=Prometee\\PhpClassGenerator\\Builder\\ClassBuilder
interfaces=Prometee\\PhpClassGenerator\\Builder\\ClassBuilderInterface
traits=
public buildGetterSetter(Prometee\\PhpClassGenerator\\Model\\Property\\PropertyInterface $property):Prometee\\PhpClassGenerator\\Model\\Method\\GetterSetterInterface',
    'FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\BaseIdFixer' => 'class final FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\BaseIdFixer
parent=-
interfaces=FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\ModelFixerInterface
traits=
public fix(string $modelName,array &$structure):void
public supports(string $modelName,array $structure):bool',
    'FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\CompositeModelFixer' => 'class final FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\CompositeModelFixer
parent=-
interfaces=FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\ModelFixerInterface
traits=
public __construct(iterable $modelFixers):-
public fix(string $modelName,array &$structure):void
public supports(string $modelName,array $structure):bool',
    'FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\ModelFixerInterface' => 'interface abstract FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\ModelFixerInterface
parent=-
interfaces=
traits=
public abstract fix(string $modelName,array &$structure):void
public abstract supports(string $modelName,array $structure):bool',
    'FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\SelectionTypeDefaultValueAdder' => 'class final FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\SelectionTypeDefaultValueAdder
parent=-
interfaces=FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\ModelFixerInterface
traits=
public __construct(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface $recordListOperations):-
public fix(string $modelName,array &$structure):void
public supports(string $modelName,array $structure):bool',
    'FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverter' => 'class final FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverter
parent=-
interfaces=FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverterInterface
traits=
public __construct(FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\RecordListOperationsInterface $recordListOperations,FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\InspectionOperationsInterface $inspectionOperations,Prometee\\PhpClassGenerator\\Helper\\PhpReservedWordsHelperInterface $phpReservedWordsHelper,FluxSE\\OdooApiClient\\PhpGenerator\\ModelFixer\\ModelFixerInterface $modelFixer):-
public convert(string $modelNamespace,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;):array
public getClassNameFormModelName(string $modelName):string',
    'FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverterHelper' => 'class final FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverterHelper
parent=-
interfaces=
traits=
public static prettySelection(array $selection,int $deep=i:0;):array
public static sanitizeComment(string $comment):string
public static transformTypes(array $fieldInfo):array',
    'FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverterInterface' => 'interface abstract FluxSE\\OdooApiClient\\PhpGenerator\\OdooModelsStructureConverterInterface
parent=-
interfaces=
traits=
const public BASE_MODEL_NAME=s:4:"base";
public abstract convert(string $modelNamespace,?FluxSE\\OdooApiClient\\Operations\\Object\\ExecuteKw\\Arguments\\SearchDomainsInterface $searchDomains=N;):array',
    'FluxSE\\OdooApiClient\\PhpGenerator\\OdooPhpClassesGenerator' => 'class final FluxSE\\OdooApiClient\\PhpGenerator\\OdooPhpClassesGenerator
parent=-
interfaces=Prometee\\PhpClassGenerator\\PhpGeneratorInterface
traits=Prometee\\PhpClassGenerator\\PhpGeneratorTrait
property protected $classBuilder:Prometee\\PhpClassGenerator\\Builder\\ClassBuilderInterface
property protected $classesConfig:?array
property protected $namespace:?string
property protected $path:?string
public __construct(Prometee\\PhpClassGenerator\\Builder\\ClassBuilderInterface $classBuilder):-
protected buildAttribute(array $attributeLines,Prometee\\PhpClassGenerator\\Model\\Attribute\\AttributeAwareInterface $attributeAware):void
protected buildConstants(array $constantsConfig,string $eol):void
protected buildMethods(array $methodsConfig,string $eol):void
public buildParameters(array $parametersConfig,Prometee\\PhpClassGenerator\\Model\\Method\\MethodInterface $method):void
protected buildPhpDoc(array $phpdocLines,Prometee\\PhpClassGenerator\\Model\\PhpDoc\\PhpDocAwareInterface $phpDocAware):void
protected buildProperties(array $propertiesConfig,string $eol):void
public configure(string $path,string $namespace,array $classesConfig=a:0:{}):void
public generate(?string $indent=N;,?string $eol=N;):bool
public getClassBuilder():Prometee\\PhpClassGenerator\\Builder\\ClassBuilderInterface
public getClassesConfig():array
public getNamespace():string
public getPath():string
protected isConfigured():bool
public setClassBuilder(Prometee\\PhpClassGenerator\\Builder\\ClassBuilderInterface $classBuilder):void
public setClassesConfig(array $classesConfig):void
public setNamespace(string $namespace):void
public setPath(string $path):void
public writeClass(string $classContent,string $classFilePath):bool',
    'FluxSE\\OdooApiClient\\PropertyAccess\\OdooPropertyAccessor' => 'class final FluxSE\\OdooApiClient\\PropertyAccess\\OdooPropertyAccessor
parent=-
interfaces=Symfony\\Component\\PropertyAccess\\PropertyAccessorInterface
traits=
public __construct(Symfony\\Component\\PropertyAccess\\PropertyAccessorInterface $decoratedPropertyAccessor):-
public getValue(object|array $objectOrArray,Symfony\\Component\\PropertyAccess\\PropertyPathInterface|string $propertyPath):?mixed
public isReadable(object|array $objectOrArray,Symfony\\Component\\PropertyAccess\\PropertyPathInterface|string $propertyPath):bool
public isWritable(object|array $objectOrArray,Symfony\\Component\\PropertyAccess\\PropertyPathInterface|string $propertyPath):bool
public setValue(object|array &$objectOrArray,Symfony\\Component\\PropertyAccess\\PropertyPathInterface|string $propertyPath,?mixed $value):void',
    'FluxSE\\OdooApiClient\\Provider\\ModelFieldsProvider' => 'class final FluxSE\\OdooApiClient\\Provider\\ModelFieldsProvider
parent=-
interfaces=FluxSE\\OdooApiClient\\Provider\\ModelFieldsProviderInterface
traits=
public provide(string $className,array $context):array',
    'FluxSE\\OdooApiClient\\Provider\\ModelFieldsProviderInterface' => 'interface abstract FluxSE\\OdooApiClient\\Provider\\ModelFieldsProviderInterface
parent=-
interfaces=
traits=
const public FIELDS_CONTEXT=s:12:"read_options";
public abstract provide(string $className,array $context):array',
    'FluxSE\\OdooApiClient\\Provider\\ModelFieldsRemoverProvider' => 'class final FluxSE\\OdooApiClient\\Provider\\ModelFieldsRemoverProvider
parent=-
interfaces=FluxSE\\OdooApiClient\\Provider\\ModelFieldsProviderInterface
traits=
public __construct(FluxSE\\OdooApiClient\\Provider\\ModelFieldsProviderInterface $decoratedModelFieldsProvider,string $modelName,array $fieldsToRemove=a:0:{}):-
public provide(string $className,array $context):array',
    'FluxSE\\OdooApiClient\\Serializer\\Factory\\SerializerFactory' => 'class final FluxSE\\OdooApiClient\\Serializer\\Factory\\SerializerFactory
parent=-
interfaces=FluxSE\\OdooApiClient\\Serializer\\Factory\\SerializerFactoryInterface
traits=
public create():Symfony\\Component\\Serializer\\Serializer
public getDateFormat():string
public setDateFormat(string $dateFormat):void
public setupEncoders():array
public setupNormalizers():array
public setupObjectNormalizer():FluxSE\\OdooApiClient\\Serializer\\OdooNormalizer
public setupPropertyAccessor():Symfony\\Component\\PropertyAccess\\PropertyAccessorInterface',
    'FluxSE\\OdooApiClient\\Serializer\\Factory\\SerializerFactoryInterface' => 'interface abstract FluxSE\\OdooApiClient\\Serializer\\Factory\\SerializerFactoryInterface
parent=-
interfaces=
traits=
public abstract create():Symfony\\Component\\Serializer\\Serializer
public abstract setupEncoders():array
public abstract setupNormalizers():array
public abstract setupObjectNormalizer():FluxSE\\OdooApiClient\\Serializer\\OdooNormalizer
public abstract setupPropertyAccessor():Symfony\\Component\\PropertyAccess\\PropertyAccessorInterface',
    'FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcDecoder' => 'class final FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcDecoder
parent=-
interfaces=Symfony\\Component\\Serializer\\Encoder\\ContextAwareDecoderInterface,Symfony\\Component\\Serializer\\Encoder\\DecoderInterface
traits=
const public CTX_JSONRPC_DECODE_DEPTH=s:20:"jsonrpc_decode_depth";
const public FORMAT=s:7:"jsonrpc";
public __construct(array $defaultContext=a:0:{}):-
public decode(string $data,string $format,array $context=a:0:{}):array|string|int|bool
public supportsDecoding(-$format,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcEncoder' => 'class final FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcEncoder
parent=-
interfaces=Symfony\\Component\\Serializer\\Encoder\\EncoderInterface
traits=
const public CTX_JSONRPC_VERSION=s:15:"jsonrpc_version";
const public FORMAT=s:7:"jsonrpc";
public __construct(array $defaultContext=a:0:{}):-
public encode(-$data,string $format,array $context=a:0:{}):string
public supportsEncoding(-$format):bool',
    'FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcSerializerHelper' => 'class final FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcSerializerHelper
parent=-
interfaces=FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcSerializerHelperInterface,FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
traits=
public __construct(Symfony\\Component\\Serializer\\Serializer $serializer,Psr\\Http\\Message\\StreamFactoryInterface $streamFactory):-
public decodeResponseBody(Psr\\Http\\Message\\StreamInterface $body):array|string|int|bool
public deserializeResponseBody(Psr\\Http\\Message\\StreamInterface $body,string $type):-
public getDecodeDepth():int
public getSerializer():Symfony\\Component\\Serializer\\Serializer
public getVersion():string
public serializeRequestBody(FluxSE\\OdooApiClient\\Api\\RequestBodyInterface $requestBody):Psr\\Http\\Message\\StreamInterface
public setDecodeDepth(int $decodeDepth):void
public setVersion(string $version):void',
    'FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcSerializerHelperInterface' => 'interface abstract FluxSE\\OdooApiClient\\Serializer\\JsonRpc\\JsonRpcSerializerHelperInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
traits=
public abstract getDecodeDepth():int
public abstract getVersion():string
public abstract setDecodeDepth(int $decodeDepth):void
public abstract setVersion(string $version):void',
    'FluxSE\\OdooApiClient\\Serializer\\NullOdooRelationDenormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\NullOdooRelationDenormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\DenormalizerInterface
traits=
public denormalize(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):?mixed
public getSupportedTypes(?string $format):array
public supportsDenormalization(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\NullableDateTimeDenormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\NullableDateTimeDenormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\DenormalizerInterface
traits=
public __construct(Symfony\\Component\\Serializer\\Normalizer\\DenormalizerInterface $dateTimeNormalizer):-
public denormalize(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):?mixed
public getSupportedTypes(?string $format):array
public supportsDenormalization(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\OdooNormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\OdooNormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface,Symfony\\Component\\Serializer\\Normalizer\\DenormalizerInterface,Symfony\\Component\\Serializer\\SerializerAwareInterface
traits=
public __construct(Symfony\\Component\\Serializer\\Normalizer\\ObjectNormalizer $decoratedObjectNormalizer):-
public denormalize(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):?mixed
public getSupportedTypes(?string $format):array
public normalize(?mixed $object,?string $format=N;,array $context=a:0:{}):ArrayObject|array|string|int|float|bool|null
public setSerializer(Symfony\\Component\\Serializer\\SerializerInterface $serializer):void
public supportsDenormalization(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):bool
public supportsNormalization(?mixed $data,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\OdooRelationDenormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\OdooRelationDenormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\DenormalizerInterface
traits=
public denormalize(-$data,-$type,-$format=N;,array $context=a:0:{}):FluxSE\\OdooApiClient\\Model\\OdooRelation
public getSupportedTypes(?string $format):array
public supportsDenormalization(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\OdooRelationNormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\OdooRelationNormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface,Symfony\\Component\\Serializer\\Normalizer\\NormalizerAwareInterface
traits=Symfony\\Component\\Serializer\\Normalizer\\NormalizerAwareTrait
property protected $normalizer:Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface
public getSupportedTypes(?string $format):array
public normalize(-$object,-$format=N;,array $context=a:0:{}):array|int|false|null
public setNormalizer(Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface $normalizer):void
public supportsNormalization(?mixed $data,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\OdooRelationSingleDenormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\OdooRelationSingleDenormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\DenormalizerInterface
traits=
public denormalize(-$data,-$type,-$format=N;,array $context=a:0:{}):FluxSE\\OdooApiClient\\Model\\OdooRelation
public getSupportedTypes(?string $format):array
public supportsDenormalization(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\OdooRelationsDenormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\OdooRelationsDenormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\DenormalizerInterface
traits=
public denormalize(-$data,-$type,-$format=N;,array $context=a:0:{}):array
public getSupportedTypes(?string $format):array
public supportsDenormalization(?mixed $data,string $type,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\OdooRelationsNormalizer' => 'class final FluxSE\\OdooApiClient\\Serializer\\OdooRelationsNormalizer
parent=-
interfaces=Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface,Symfony\\Component\\Serializer\\Normalizer\\NormalizerAwareInterface
traits=Symfony\\Component\\Serializer\\Normalizer\\NormalizerAwareTrait
const public NORMALIZE_FOR_UPDATE=s:20:"normalize_for_update";
property protected $normalizer:Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface
public getSupportedTypes(?string $format):array
public normalize(-$object,-$format=N;,array $context=a:0:{}):array
public setNormalizer(Symfony\\Component\\Serializer\\Normalizer\\NormalizerInterface $normalizer):void
public supportsNormalization(-$data,?string $format=N;,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface' => 'interface abstract FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
parent=-
interfaces=
traits=
public abstract decodeResponseBody(Psr\\Http\\Message\\StreamInterface $body):array|string|int|bool
public abstract deserializeResponseBody(Psr\\Http\\Message\\StreamInterface $body,string $type):-
public abstract getSerializer():Symfony\\Component\\Serializer\\Serializer
public abstract serializeRequestBody(FluxSE\\OdooApiClient\\Api\\RequestBodyInterface $requestBody):Psr\\Http\\Message\\StreamInterface',
    'FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcDecoder' => 'class final FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcDecoder
parent=-
interfaces=Symfony\\Component\\Serializer\\Encoder\\ContextAwareDecoderInterface,Symfony\\Component\\Serializer\\Encoder\\DecoderInterface
traits=
const public CTX_XMLRPC_ENCODING=s:15:"xmlrpc_encoding";
const public FORMAT=s:6:"xmlrpc";
public __construct(array $defaultContext=a:0:{}):-
public decode(string $data,string $format,array $context=a:0:{}):array|string|int|bool
public supportsDecoding(-$format,array $context=a:0:{}):bool',
    'FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcEncoder' => 'class final FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcEncoder
parent=-
interfaces=Symfony\\Component\\Serializer\\Encoder\\EncoderInterface
traits=
const public CTX_XMLRPC_ENCODING=s:15:"xmlrpc_encoding";
const public CTX_XMLRPC_ESCAPING=s:15:"xmlrpc_escaping";
const public FORMAT=s:6:"xmlrpc";
public __construct(array $defaultContext=a:0:{}):-
public encode(?mixed $data,string $format,array $context=a:0:{}):string
public supportsEncoding(-$format):bool',
    'FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcSerializerHelper' => 'class final FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcSerializerHelper
parent=-
interfaces=FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcSerializerHelperInterface,FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
traits=
public __construct(Symfony\\Component\\Serializer\\Serializer $serializer,Psr\\Http\\Message\\StreamFactoryInterface $streamFactory):-
public decodeResponseBody(Psr\\Http\\Message\\StreamInterface $body):array|string|int|bool
public deserializeResponseBody(Psr\\Http\\Message\\StreamInterface $body,string $type):-
public getEncoding():string
public getSerializer():Symfony\\Component\\Serializer\\Serializer
public serializeRequestBody(FluxSE\\OdooApiClient\\Api\\RequestBodyInterface $requestBody):Psr\\Http\\Message\\StreamInterface
public setEncoding(string $encoding):void',
    'FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcSerializerHelperInterface' => 'interface abstract FluxSE\\OdooApiClient\\Serializer\\XmlRpc\\XmlRpcSerializerHelperInterface
parent=-
interfaces=FluxSE\\OdooApiClient\\Serializer\\RpcSerializerHelperInterface
traits=
public abstract getEncoding():string
public abstract setEncoding(string $encoding):void',
    'is_false' => 'public is_false(?mixed $value):bool',
    'is_mixed' => 'public is_mixed(?mixed $value):bool',
  ),
);
