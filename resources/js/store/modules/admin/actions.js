import * as actions from '../../action-types'
import admin from '../../../api/admin'

export default {
  [ actions.NEWPIZZA ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.newPizza(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.UPDATEPIZZA ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.updatePizza(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.DELETEPIZZA ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.deletePizza(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },

  [ actions.NEWFLAVOR ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.newFlavor(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.UPDATEFLAVOR ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.updateFlavor(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.DELETEFLAVOR ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.deleteFlavor(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },

  [ actions.NEWDRINK ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.newDrink(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.UPDATEDRINK ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.updateDrink(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.DELETEDRINK ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.deleteDrink(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },

  [ actions.NEWADDITIONAL ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.newAdditional(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.UPDATEADDITIONAL ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.updateAdditional(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.DELETEADDITIONAL ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.deleteAdditional(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },

  [ actions.NEWSIZE ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.newSize(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.UPDATESIZE ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.updateSize(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
  [ actions.DELETESIZE ] (context, value) {
    return new Promise((resolve, reject) => {
      admin.deleteSize(value).then(response => {
        resolve(response)
      }).catch(error => {
        reject(error)
      })
    })
  },
}
