import getters from './getters'
import actions from './actions'
import mutations from './mutations'

const state = {
  cartProducts: JSON.parse(localStorage.getItem('cart')) || [],
}

export default {
  state,
  getters,
  actions,
  mutations
}
