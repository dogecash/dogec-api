# Network API for DogeCash

Offers several endpoints with information about the DogeCash network.

## Install

Clone repository, run composer and configure RPC core server in .env

## API

Use `https://network.dogecash.org/api/v1` as the base of every endpoint.

For example; `GET https://network.dogecash.org/api/v1/masternodecount`

In order to improve performance, some endpoints are cached and updated every 10 minutes. These are:

-   masternodecount
-   moneysupply
-   difficulty
-   blockcount
-   proposals

These endpoints retrieve a response in real time:

-   masternodes
-   masternodes/{address}
-   peers

## API Calls List

### masternodecount

> Returns an array with the count of masternodes by status

-   Endpoint: `/masternodecount`

Example: `GET https://network.dogecash.org/api/v1/masternodecount`

### moneysupply

> Returns the money supply for DOGEC

-   Endpoint: `/moneysupply`

Example: `GET https://network.dogecash.org/api/v1/moneysupply`

### difficulty

> Returns the staking difficulty for DOGEC

-   Endpoint: `/difficulty`

Example: `GET https://network.dogecash.org/api/v1/difficulty`

### blockcount

> Returns the total of blocks in the DOGEC network

-   Endpoint: `/blockcount`

Example: `GET https://network.dogecash.org/api/v1/blockcount`

### proposals

> Returns an array with all the active proposals + information

-   Endpoint: `/proposals`

Example: `GET https://network.dogecash.org/api/v1/proposals`

### masternodes

> Returns an array with all the registered masternodes + information

-   Endpoint: `/masternodes`

Example: `GET https://network.dogecash.org/api/v1/masternodes`

### masternodes/{address}

> Returns an array with all the information about the masternode identified by {address}

-   Endpoint: `/masternodes/{address}`

Example: `GET https://network.dogecash.org/api/v1/masternodes/DBCLwNa8f3WzN8WLoq4BGHopVDBiwnKhuT`

### peers

> Returns an array with peers

-   Endpoint: `/peers/`

Example: `GET https://network.dogecash.org/api/v1/peers`
