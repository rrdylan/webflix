<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    */
    public function run(): void
    {
        //Utilisateurs 
        User::factory()->create(['email' => 'jean.claude@mandale.com','password'=>'pass']);
        User::factory()->create(['email' => 'dylan@gmail.com']);
        
        //Catégories sur l'API
        $genres = Http::get('https://api.themoviedb.org/3/genre/movie/list',
        [
            'api_key'=> config('services.themoviedb.key'),
            'language' => 'fr-FR',
            ])->json('genres');
            
            Category::factory()->createMany($genres);
            
            //Films sur l'API
            $results = Http::get('https://api.themoviedb.org/3/movie/now_playing',
            [
                'api_key' => config('services.themoviedb.key'),
                'language' => 'fr-FR',
                ])->throw()->json('results');
                
                
                foreach($results as $result){
                    $result = Http::get('https://api.themoviedb.org/3/movie/'.$result['id'],
                    [
                        'api_key'=> config('services.themoviedb.key'),
                        'language' => 'fr-FR',
                        'append_to_response' => 'videos,credits',
                        ])->throw()->json();
                        
                        //dump($result);
                        
                        
                        $movie = Movie::factory()->create([
                            'title'=> $result['title'],
                            'synopsis'=> $result['overview'],
                            'duration'=> $result['runtime'],
                            'cover'=>  'https://image.tmdb.org/t/p/w400'.$result['poster_path'],
                            'released_at' => $result['release_date'],
                            'youtube' => $result['videos']['results'][0]['key'] ?? null,
                            'category_id' => $result['genres'][0]['id'] ?? null,
                            'user_id' => User::all()->random(),
                        ]);
                        
                        $actors = $result["credits"]["cast"];

                        foreach($actors as $actor){
                            $data_actor = Http::get("https://api.themoviedb.org/3/person/".$actor['id'],
                            [
                                'api_key'=> config('services.themoviedb.key'),
                                'language' => 'fr-FR',
                                ])->throw()->json();
                                
                                $person = Actor::firstOrCreate(
                                    ['id' => $data_actor['id']],
                                    [
                                        'name' => $data_actor['name'],
                                        'avatar' => 'https://image.tmdb.org/t/p/w400'.$data_actor['profile_path'],
                                        'birthday' => $data_actor['birthday'],
                                        ]
                                    );
                                    
                                    $movie->actors()->attach($person);
                                }
                                
                            }
                            
                            
                            // Movie::factory(100)->create(function(){
                                //     return ['category_id'=> Category::all()->random()];
                                // });
                                
                            }
                        }
                        