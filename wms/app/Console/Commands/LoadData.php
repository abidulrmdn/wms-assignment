<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Article;
use App\Models\Product;

class LoadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load the data from the file into the db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            //Read from both files and store them in memory
            $products = json_decode(file_get_contents( __DIR__ . "/../../../database/jsonData/products.json" ), true)['products'];
            $articles = json_decode(file_get_contents( __DIR__ . "/../../../database/jsonData/inventory.json" ), true)['inventory'];            
        } catch (Exception $e) {
            throw new Exception("Something webt wrong while loading the json files", 1);            
        }


        // Store Articles into DB
        foreach ($articles as $article_part) {
            // Create a new article 
            $article = new Article();
            $article->id = $article_part['art_id'];
            $article->name = $article_part['name'];
            $article->stock = $article_part['stock'];
            $article->save();
        }

        // Store Articles into DB
        foreach ($products as $product_part) {
            // Create a new product
            $product = new Product();
            $product->price = $product_part['price'];
            $product->name = $product_part['name'];
            $product->save();

            // Attach the articles from db to this product
            foreach ($product_part['contain_articles'] as $containedArticle) {

                $product->articles()->attach(
                    Article::where('id',$containedArticle['art_id'])->first(),
                    ['quantity' => $containedArticle['amount_of']]
                );
            }
            
        }


    }
}
