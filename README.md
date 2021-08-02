# DogeCash API

Offers several endpoints with information about DogeCash.

## Install

Clone repository, run composer and configure settings in .env

## API

Use `https://api.dogecash.org/api/v1` as the base of every endpoint.

For example; `GET https://api.dogecash.org/api/v1/network/masternodecount`

In order to improve performance, some endpoints are cached and updated every 10 minutes. These are:

-   /network/masternodecount
-   /network/moneysupply
-   /network/difficulty
-   /network/blockcount
-   /network/proposals
-   /wallet/latest
-   /stats
-   /announcements

These endpoints retrieve a response in real time:

-   /network/masternodes
-   /network/masternodes/{address}
-   /network/peers

## Network endpoints

#### masternodecount

> Returns an array with the count of masternodes by status

-   Endpoint: `/network/masternodecount`

Example: `GET https://api.dogecash.org/api/v1/network/masternodecount`

### moneysupply

> Returns the money supply for DOGEC

-   Endpoint: `/network/moneysupply`

Example: `GET https://api.dogecash.org/api/v1/network/moneysupply`

### difficulty

> Returns the staking difficulty for DOGEC

-   Endpoint: `/network/difficulty`

Example: `GET https://api.dogecash.org/api/v1/network/difficulty`

### blockcount

> Returns the total of blocks in the DOGEC network

-   Endpoint: `/network/blockcount`

Example: `GET https://api.dogecash.org/api/v1/network/blockcount`

### proposals

> Returns an array with all the active proposals + information

-   Endpoint: `/network/proposals`

Example: `GET https://api.dogecash.org/api/v1/network/proposals`

### masternodes

> Returns an array with all the registered masternodes + information

-   Endpoint: `/network/masternodes`

Example: `GET https://api.dogecash.org/api/v1/network/masternodes`

### masternodes/{address}

> Returns an array with all the information about the masternode identified by {address}

-   Endpoint: `/network/masternodes/{address}`

Example: `GET https://api.dogecash.org/api/v1/network/masternodes/DBCLwNa8f3WzN8WLoq4BGHopVDBiwnKhuT`

### peers

> Returns an array with peers

-   Endpoint: `/network/peers/`

Example: `GET https://api.dogecash.org/api/v1/network/peers`

## General endpoints

### latest wallet

> Returns the latest version and downloadable files for the DogeCash wallet

-   Endpoint: `/wallet/latest/`

Example: `GET https://api.dogecash.org/api/v1/wallet/latest/`

### stats

> Returns general information about DogeCash: Days since last Github activity, Active wallets & Discord members.

-   Endpoint: `/stats/`

Example: `GET https://api.dogecash.org/api/v1/stats/`

### announcements

> Returns the last DogeCash announcements.

-   Endpoint: `/announcements/`

Example: `GET https://api.dogecash.org/api/v1/announcements/`
