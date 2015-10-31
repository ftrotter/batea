<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

Artisan::add(new scrapeWikiMedicine);
Artisan::add(new singleDepthScrapeWikiMedicine);
Artisan::add(new createWikiStructure);
Artisan::add(new createGraphStructure);
Artisan::add(new createPubMedData);
Artisan::add(new createLabelData);
Artisan::add(new runOnce);
Artisan::add(new testIsClinical);
Artisan::add(new refreshWikiData);
