import axios from "axios";
import { useEffect, useState } from "react";


function MovieList(){
    const [movies, setmovies] = useState([]);
    const [loading, setLoading] = useState(false);

    const searched = () => {
        return movies.filter(movie => {
            return movie.title.toLowerCase().includes(search.loLowerCase());
        })
    }

    useEffect( ()=> {
        // Requêtes sur l'APi pour aller chercher des films
        axios.get('http://localhost:8000/api/films').then((response) =>{
            setTimeout(() => {
                setmovies(response.data);
                setLoading(false);
            }, 2000);
        });
    });

    if(loading){
        return(
            <div className="text-center my-5">
               <div className="spinner-grow"></div>
            </div>
        );
    
    }    

    return(
        <div>
            <h1>Les films</h1>
            <p>Intégrer les films sur 4 colonnes(avec les cartes) avec les titres, photo, category, durée</p>
            <p>L'intégration devra se faire dans un composant qui aura pour props le mivue </p>
                
            <div className="row row-cols-2 row-cols-md-3 row-cols-lg-4">  
            {
                movies.map( movie => 
                    
                    <div className="col d-flex flex-column justify-content-between" key={movie.id}>
                        <div className="list-movie-data flex-grow-1 justify-content-between m-1 card text-center">
                            <img src={movie.cover} alt={movie.title} className="list-movie-image img-fluid w-200" />
                            <h4>{ movie.title } </h4>
                            <p className="list-movie-meta"> {movie.category.name} | {movie.duration}</p>
                            <button className="btn btn-primary" data-toggle="modal" data-target="#modalSynopsis"> Synopsis </button>
                        </div>
                     </div>

                )    
            }
            </div>
        </div>
    )
}

export default MovieList