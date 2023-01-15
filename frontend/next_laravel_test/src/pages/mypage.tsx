import Head from 'next/head'
import Image from 'next/image'
import Link from 'next/link'
import { Inter } from '@next/font/google'
import styles from '../styles/Home.module.css'

import axios from "../libs/axios";
import React, { useEffect } from 'react';

import { useHandleLogout } from '../components/shared/function/Auth/AuthLisnter'
import { mapDatum } from '../components/atomic/Atoms/mapData'

import { GoogleMap as GoogleMapComponent, LoadScript } from '@react-google-maps/api';
import { FC } from "react";
import { useJsApiLoader, MarkerF, InfoWindowF } from "@react-google-maps/api";
import { useState } from "react";

// import  "../../.env";

// When  you try to change Google Map Styles
//  import { InterfaceMap } from "./GoogleMapStyles";
//  const googleMapOptions = {
//   styles: InterfaceMap,
// };

console.log({mapDatum})
const handleLogout = useHandleLogout()

type Props = {
  defaultPosition: google.maps.LatLngLiteral;
};

const markerLabel: google.maps.MarkerLabel = {
    text: "東京スカイツリー",
    fontFamily: "sans-serif",
    fontSize: "15px",
    fontWeight: "bold",
  };


const GoogleMap: FC<Props> = (props) => {
  const { map, zoom, isLoaded, onLoad } = useMap({
    defaultPosition: props.defaultPosition,
  });

  const containerStyle = {
    width: "100vw",
    height: "75vh",
  };
  return (
    <>
      {isLoaded ? (
        <GoogleMapComponent
            // When  you try to change Google Map Styles
            // options={googleMapOptions}
            zoom={zoom}
            mapContainerStyle={containerStyle}
            onLoad={onLoad}
        >
            <MarkerF position={props.defaultPosition} label={markerLabel} />
            {/* HTMLでの吹き出しを設置 */}
            {/* <InfoWindowF position={props.defaultPosition}>
                <>
                <h3 >東京スカイツリー</h3>
                </>
            </InfoWindowF> */}
        </GoogleMapComponent>
      ) : (
        "Now loading.."
      )}
    </>
  );
};

type Map = google.maps.Map;
export const useMap = ({ defaultPosition }: Props) => {
  const { isLoaded } = useJsApiLoader({
    id: "google-map",
    // NEXT_PUBLIC_にしないと、サーバ側での処理となるためクライアントで使用できなくなりエラーになる
    googleMapsApiKey: process.env.NEXT_PUBLIC_GOOGLE_MAPS_API_KEY ?? 'NO API_KEY',
  });
  const [map, setMap] = useState<Map | null>(null);
  const onLoad = (map: Map) => {
    const bounds = new window.google.maps.LatLngBounds(defaultPosition);
    map.fitBounds(bounds);
    setMap(map);
};
const zoom: number = 15;

  return { map, zoom, isLoaded, onLoad };
};

 


export default function Home() {
    useEffect(() => {
        //   axios.get("/api/books").then((res) => {
        //   const data = res.data;
        //   console.log(data);
        //  });
  }, []);

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
                {/* <Map/> */}
                {/* JSでの処理 */}
                {/* <div className="area area-map"> */}
                    {/* <div className="map " style={{width: '400px', height:'100px'}}
                    ></div> */}
                {/* </div> */}
                <GoogleMap
                    defaultPosition={{
                        lat: 35.70989699999999,
                        lng: 139.81071400000002,
                    }}
                >
                    {/*  */}
                </GoogleMap>

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
                        <span className="text">検索ヒット数：{'51'}店舗</span>
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
                        <div className="stamp_button active">
                        <span className="text">サンプルテキスト</span>
                        </div>
                    </div>
                    {/* Google Map */}
                            <div className="area area-map">
                                <div className="map" 
                                ></div>
                            </div>
                    {/* <Map/> */}
                </div>
            </div>
        </div>
    </>
  )
  
}
