import './bootstrap';
import ReactDOM from 'react-dom/client';
import MovieList from './components/MovieList';

const root = document.getElementById('root');

if(root){
    ReactDOM.createRoot(root).render(
      <MovieList />
    );        
}