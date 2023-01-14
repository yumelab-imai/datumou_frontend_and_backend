import Head from 'next/head'
import Image from 'next/image'
import Link from 'next/link'
import { Inter } from '@next/font/google'
import styles from '../styles/Home.module.css'

import axios from "../libs/axios";
import React, { useEffect } from 'react';

import { useHandleLogout } from '../components/shared/function/Auth/AuthLisnter'
import { mapDatum } from '../components/atomic/Atoms/mapData'

// import '../components/atomic/Atoms/css/stamprally/main.css';
// import '../components/atomic/Atoms/css/stamprally/reset.css';

console.log({mapDatum})
const handleLogout = useHandleLogout()


const inter = Inter({ subsets: ['latin'] })

export default function Home() {
  useEffect(() => {
        //   axios.get("/api/books").then((res) => {
        //   const data = res.data;
        //   console.log(data);
        //  });
  }, []);

//   function initMap() {
//       var opts = {
//         zoom: 15,
//         center: new google.maps.LatLng(35.709984,139.810703)
//       };
//       var map = new google.maps.Map(document.getElementById("map"), opts);
//     }

    const initMap = (): void => {
        let opts = {
        zoom: 15,
        center: new google.maps.LatLng(35.658594999999984,74540199999998)
      };
      let map = new google.maps.Map(document.getElementById("map"), opts);
    }

  return (
    <>
      <Head>
        <title>Create Next App</title>
      </Head>
      <div className="page page-course">
    <div className="area_wrapper">
      <div className="area area-course_header">
        <div className="course_header">
          <h1 className="title">{'医療脱毛クリニック'}</h1>
        </div>
      </div>

      <div className="area area-sub_controllers">
        <div className="sub_controllers">
          <div
            className="button current_position_button"
          >
            現在地
          </div>
          <div
            className="button watch_position_restart_button"
          >
            GPS更新
          </div>
        </div>
      </div>

      <div className="area area-current_stamp_info">
          <div className="current_stamp_info">
            <span className="text">検索ヒット数：{'999'}</span>
          </div>
      </div>

        <div className="area area-spot_list">
            

        <div className="area area-stamp_button">

            <div className="stamp_button active">
            <span className="text">指定のクリニック検索</span>
            </div>
            <div className="stamp_button">
            <span className="text">半径〇〇キロ内検索</span>
            </div>
            <div v-else className="stamp_button active">
            <span className="text">サンプルテキスト</span>
            </div>

        </div>

        {/* Google Map */}
      <div className="area area-map">
        <div className="map" 
        ></div>
      </div>
    </div>
  </div>
  </div>


    </>
  )
}
