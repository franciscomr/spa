import store from '../../store';
import isAuthenticated from '../../functions/isAuthenticated';
export default (to, from, next) => {
  //console.log(to, from, next);
  if (!store.state.user.isAuthenticated) {
    isAuthenticated()
  }

  return next();
};