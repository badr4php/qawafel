
## Assessment from Qawafel 

Using PHP Lumen (Micro-Framework By Laravel), implement this API endpoint /api/v1/transactaions.

- It should list all transactaions which combine transactaions from all the available providerDataProvider(W/X/Y).
- It should be able to filter result by providers for example /api/v1/transactaions?provider=DataProviderX it should return transactaions from DataProviderX.
- It should be able to filter result three statusCode (paid, pending, reject) for example /api/v1/transactaions?statusCode=paid .
- It should return all transactaions from all providers that have status code paid.
- It should be able to filer by amount range for example /api/v1/transactaions?amounteMin=10&amounteMax=100 it should return result between 10 and 100 including 10 and 100.
- It should be able to filer by currency.
- It should be able to combine all this filter together.