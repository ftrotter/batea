<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get("/pubmed/{pmid}/json", "PubMedController@get_json");
Route::get("/pubmed/{pmid}", "PubMedController@article");
Route::get("/pubmed/", "PubMedController@index");
Route::get("/pubmedlink/json", "PubMedController@view_all_links_json");
Route::get("/pubmedlink", "PubMedController@view_all_links");

Route::get("/labellink/json", "LabelController@view_all_links_json");
Route::get("/labellink", "LabelController@view_all_links");

Route::get("/wiki/{wikititle}/", "WikiController@article");
Route::get("/wiki/{wikititle}/json", "WikiController@get_json");
Route::get("/wiki/{wikititle}/{revision_id}/json", "WikiController@get_json");
Route::get("/wiki/{wikititle}/{revision_id}", "WikiController@article");

Route::get("/analysis/{wikititle}/graph_json", "AnalysisController@recurse_graph_json");
Route::get("/analysis/{wikititle}", "AnalysisController@browse");

Route::get("/batea/token/{user_token}/json", "BateaController@get_user_json");
Route::get("/batea/token/{user_token}", "BateaController@show_user");
Route::get("/batea/tree/{user_token}", "BateaController@show_tree");
Route::get("/batea", "BateaController@index");


Route::get("/wikitext/", "WikitextController@index");
Route::get("/wikitext/{wikititle?}/", "WikitextController@wikitext")->where('wikititle', '(.*)');

Route::get("/project/{project}/{importance}/{quality}/","ProjectController@project_json");
Route::get("/project/{project}/{importance}/","ProjectController@project_json");
Route::get("/project/{project}/","ProjectController@project_json");

Route::get('/', function()
{
	return View::make('html')->nest('content','hello',array(

                                                          	)
                                    	);
});
