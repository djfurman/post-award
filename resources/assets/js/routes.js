// Vue Component
import FacetLandingPage  from './components/FacetLandingPage';
import Temp from './components/Temp';
import SystemAccessRequest from './components/Saar2875';

export default [
  {
    path: '/',
    name: 'home',
    component: FacetLandingPage
  },
  {
    path: '/temp',
    name: 'temp',
    component: Temp
  },
  {
    path: '/login',
    name: 'saar',
    component: SystemAccessRequest
  }
];
