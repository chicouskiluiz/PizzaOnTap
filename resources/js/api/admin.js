import axios from 'axios'

export default {
  newDrink (value) {
    return axios.post('/drink', value)
  },
  updateDrink (value) {
    const url = `/drink/${value.id}`
    return axios.put(url, value)
  },
  deleteDrink (value) {
    const url = `/drink/${value}`
    return axios.delete(url)
  }
}
