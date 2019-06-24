import axios from 'axios'

export default {
  newDrink (value) {
    return axios.post('/drink', value)
  },
  updateDrink (value) {
    return axios.post('/login', value)
  },
  deleteDrink (value) {
    return axios.post('/login', value)
  }
}
