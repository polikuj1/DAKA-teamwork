import axios from 'axios';

export function logOut(component) {
  
    axios.get(`${this.$URL}/loginOut.php`)
    .then((res) => {
        if (res.data === 'success') {
            component.loginOut();
           
          } else {
            console.error('Failed to clear session');
          }
    })
    .catch((err) => {
      console.log(err);
    })

}


