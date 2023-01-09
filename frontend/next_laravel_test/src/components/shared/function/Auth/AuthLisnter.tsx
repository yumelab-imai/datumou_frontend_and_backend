import React, { useCallback, useState, useEffect, useContext } from 'react'
import axios from 'libs/axios'
import { useRouter } from 'next/router'
import { useRecoilState } from 'recoil'
import { useRecoilValue } from "recoil";
import { atom } from "recoil";
// import { IUserState, userState } from 'components/store/atom/auth/UserState'
// import { userState } from 'components/store/atom/auth/UserState'
import { AxiosError, AxiosRequestConfig, AxiosResponse } from 'axios'
// import userData from '../../../../types/user/user.json'
// import Route from '../../variable/Route'
import { UserSelector } from "../../../store/atom/auth/UserSelecter";

// type USER = typeof userData
type USER2 = any;

const userState = atom<USER2>({
  key: "userState",// MUST unique
  default: 
    {
      id: 999,
      name: 'Masanarea',
      email: 'masa.php.engineer@gmail.com',
      password: 'qwsaqwsa',
    },
  
});

export const useHandleLogin = () => {
    // const list: USER[] = useRecoilValue(UserSelector);
//   const [user, setUser] = useRecoilState<IUserState>(userState)
//   const [user, setUser] = useRecoilState<USER2>(userState)
  const [user, setUser] = useRecoilState<USER2>(userState)
  const router = useRouter()

  const handleLogin: (email: string, password: string) => void = (email, password) => {
    const options: AxiosRequestConfig = {
      url: '/api/login',
      method: 'POST',
      params: {
        email,
        password
      }
    }

    axios.get('/sanctum/csrf-cookie').then((res: AxiosResponse) => {
      axios(options)
        .then((res: AxiosResponse<USER2>) => {
          const user = res.data
          setUser({
            id: user.id,
            name: user.name,
            email: user.email,
            password: user.password,
          })
          router.push('/')
        })
        .catch((error: AxiosError) => {
          console.log(error)
        })
    })
  }

  return {
    handleLogin
  }
}

export const useHandleLogout = () => {
//   const [user, setUser] = useRecoilState<USER2>(userState)
//   const router = useRouter()
//   const options: AxiosRequestConfig = {
//     url: '/api/logout',
//     method: 'POST'
//   }

//   return () => {
//     axios.get('/sanctum/csrf-cookie').then((res) => {
//       axios(options)
//         .then((res: AxiosResponse<boolean>) => {
//           setUser({
//             id: 0,
//             name: '',
//             email: '',
//             password: '',
//           })
//           router.push('/login')
//         })
//         .catch((error: AxiosError) => {
//           console.log(error)
//         })
//     })
//   }
return () => {console.log("logout");}
}

export const useHandleRegister = () => {
  const [user, setUser] = useRecoilState<USER2>(userState)
  const router = useRouter()
  const handleRegister = (userName: string, email: string, password: string): void => {
    const options: AxiosRequestConfig = {
      url: '/api/register',
      method: 'POST',
      params: {
        username: userName,
        email: email,
        password: password
      }
    }

    axios.get('/sanctum/csrf-cookie').then((res) => {
      axios(options)
        .then((res: AxiosResponse<USER2>) => {
          const user = res.data
          setUser({
            id: user.id,
            name: user.name,
            email: user.email,
            password: user.password
          })
          router.push('/')
        })
        .catch((error: AxiosError) => {
          console.log(error)
        })
    })
  }

  return {
    handleRegister
  }
}

export const useListenAuthState = () => {
  const [user, setUser] = useRecoilState<USER2>(userState)
  const router = useRouter()

  const listenAuthState = (): void => {
    const options: AxiosRequestConfig = {
      url: '/api/user',
      method: 'GET'
    }

    axios(options)
      .then((res: AxiosResponse<USER2>) => {
        const user = res.data
        console.log(user)

        // 認証状態で認証不要ルートに遷移した場合
        // if (Route.noGuardedRoutes().includes(router.pathname)) {
        //   router.push('/')
        // }

        setUser({
          id: user.id,
          name: user.name,
          email: user.email,
          password: user.password,
        })
      })
      .catch((error: AxiosError) => {
        setUser({
          id: 0,
          name: 'error',
          email: 'error',
          password: 'error',
        })
        // TODO: セッションタイムアウト(401)時の処理
        // if (Route.noGuardedRoutes().includes(router.pathname)) {
        //   router.push(router.pathname)
        // } else {
        //   router.push('/login')
        // }
      })
  }

  return {
    listenAuthState
  }
}