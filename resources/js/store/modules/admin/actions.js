import * as actions from '../../action-types'
import admin from '../../../api/admin'

export default {
  [ actions.NEWDRINK ] (context, credentials) {
    return new Promise((resolve, reject) => {
      admin.newDrink(credentials).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.UPDATEDRINK ] (context, credentials) {
    return new Promise((resolve, reject) => {
      admin.updateDrink(credentials).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.DELETEDRINK ] (context, credentials) {
    return new Promise((resolve, reject) => {
      admin.deleteDrink(credentials).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
}
