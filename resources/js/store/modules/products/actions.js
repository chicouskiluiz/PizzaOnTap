export default {
  addProduct: (context, product) => {
    context.commit('ADD_PRODUCT', product);
  },
  removeProduct: (context, index) => {
    context.commit('REMOVE_PRODUCT', index);
  }
}
