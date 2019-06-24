import axios from 'axios'

export default {
  newPizza (value) {
    return axios.post('/pizza', value)
  },
  updatePizza (value) {
    const url = `/pizza/${value.id}`
    return axios.put(url, value)
  },
  deletePizza (value) {
    const url = `/pizza/${value}`
    return axios.delete(url, value)
  },

  newFlavor (value) {
    return axios.post('/flavor', value)
  },
  updateFlavor (value) {
    const url = `/flavor/${value.id}`
    return axios.put(url, value)
  },
  deleteFlavor (value) {
    const url = `/flavor/${value}`
    return axios.delete(url, value)
  },

  newDrink (value) {
    return axios.post('/drink', value)
  },
  updateDrink (value) {
    const url = `/drink/${value.id}`
    return axios.put(url, value)
  },
  deleteDrink (value) {
    const url = `/drink/${value}`
    return axios.delete(url, value)
  },

  newAdditional (value) {
    return axios.post('/additional', value)
  },
  updateAdditional (value) {
    const url = `/additional/${value.id}`
    return axios.put(url, value)
  },
  deleteAdditional (value) {
    const url = `/additional/${value}`
    return axios.delete(url, value)
  },

  newSize (value) {
    return axios.post('/size', value)
  },
  updateSize (value) {
    const url = `/size/${value.id}`
    return axios.put(url, value)
  },
  deleteSize (value) {
    const url = `/size/${value}`
    return axios.delete(url, value)
  },
}
