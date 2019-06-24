
import Vue from 'vue'

export default {
  ADD_PRODUCT: (state, product) => {
    state.cartProducts.push(product);
    localStorage.setItem('cart', JSON.stringify(state.cartProducts))
  },
  REMOVE_PRODUCT: (state, index) => {
    state.cartProducts.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(state.cartProducts))
  }
}
