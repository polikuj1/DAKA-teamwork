
//firebas的引入區塊
import { initializeApp } from 'firebase/app'
import { getFirestore, collection } from 'firebase/firestore'
// ... other firebase imports //要引入其他功能請在這裡寫

export const firebaseApp = initializeApp({
  apiKey: "AIzaSyDaHUkFSvkgHhEeoHvnyONv_PtPGNtrfSU",
    authDomain: "daka-63d4d.firebaseapp.com",
    projectId: "daka-63d4d",
    storageBucket: "daka-63d4d.appspot.com",
    messagingSenderId: "279905061059",
    appId: "1:279905061059:web:59898ef383053fb3023a76",
    measurementId: "G-3SK0VJWHEC"
})


// used for the firestore refs
const db = getFirestore(firebaseApp)
// here we can export reusable database references
export const todosRef = collection(db, 'todos');

//   // Initialize Firebase
//   // const firebaseApp = initializeApp(firebaseConfig);
//   // const analytics = getAnalytics(firebaseApp);
//   export const firebaseAuth = getAuth(firebaseApp);
//   export default firebaseApp

