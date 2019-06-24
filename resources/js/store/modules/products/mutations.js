export default {
  ADD_PRODUCT: (state, product) => {
    console.log(product)
    state.cartProducts.push(product);
  },
  REMOVE_PRODUCT: (state, index) => {
    state.cartProducts.splice(index, 1);
  }
}
