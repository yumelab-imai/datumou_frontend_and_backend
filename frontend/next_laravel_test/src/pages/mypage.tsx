import Head from 'next/head'
import Image from 'next/image'
import Link from 'next/link'
import { Inter } from '@next/font/google'
import styles from '../styles/Home.module.css'

import axios from "../libs/axios";
import React, { useEffect, useMemo } from 'react';

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
let mapDatumTest = mapDatum[0]
let spotList = mapDatumTest.spots
console.log(mapDatumTest) // Datum
console.log(spotList) // Datum

console.log('spotList') // Datum
// console.log(Object.keys(spotList).map(e => spotList[e].name)) // Datum
console.log(spotList.map(e => console.log(e.name))) // Datum
// console.log({mapDatum.spots}) // Datum
const handleLogout = useHandleLogout()
// let MyPosition =1
// const [MyPosition, setMyPosition] = useState<LatLngProps | null>(null);

type TypeSpotList = {
    id: string;
    name: string;
    position: {
        lat: number;
        lng: number;
    };
    shopStars: number;
    watchCount: number;
    externalLinkUrl: string;
    foo: string;
}[]

type Map = google.maps.Map;

type LatLngProps = {
defaultPosition: google.maps.LatLngLiteral;
};
type TypeBounds = {
    north : number;
    east  : number;
    south : number;
    west  : number;
};

const markerLabel: google.maps.MarkerLabel = {
    text: "エミナル",
    fontFamily: "sans-serif",
    fontSize: "15px",
    fontWeight: "bold",
};

// 型定義サンプル
// type FooProps = ({
//     id: number
//     name?: string
//     infoList: Array<string>
// });
// const foo: React.FC<FooProps> = ({id, name, infoList}) => {




// ページで表示する『GoogleMap コンポーネント』
const GoogleMap: FC = () => {
    const defaultPosition = {
            lat: 35.70989699999999,
            lng: 139.81071400000002,
    }
    // setMyPosition(defaultPosition);
    const { map, zoom, isLoaded, onLoad } = setMapFunc({
        defaultPosition: defaultPosition,
    });

    const containerStyle = {
        width: "100vw",
        height: "75vh",
    };

    const center: google.maps.LatLngLiteral = useMemo( () => ({ lat: 44, lng: -80 }), [])
    return (
        <>
        {isLoaded ? (
            <GoogleMapComponent
                // When  you try to change Google Map Styles
                // options={googleMapOptions}
                zoom={3}
                center={center}
                mapContainerStyle={containerStyle}
                onLoad={onLoad}
            >
                <MarkerF position={defaultPosition} label={markerLabel} />
            {spotList.map(e => (
                <>
                <MarkerF position={e.position} label={markerLabel} />
                {/* HTMLでの吹き出しを設置 */}
                {/* <InfoWindowF position={e.position}>
                    <h3 >{e.name}</h3>
                </InfoWindowF>  */}
                </>
            ))}
            </GoogleMapComponent>
        ) : (
            "Now loading.."
        )}
        </>
    );
};

const createBoundsBySpots = (spotList: TypeSpotList): TypeBounds => {
    const result: TypeBounds = {
    north: 0,
    east : 0,
    south: 0,
    west : 0,
    };
    //   result.north = Math.max(spotList.map(e.position => e.position.lat));
    //   result.north = Math.max(...spotList.map(true => true) );
    result.north  = Math.max(...spotList.map(spot => spot.position.lat));
    result.east  = Math.max(...spotList.map(spot => spot.position.lng));
    result.south = Math.min(...spotList.map(spot => spot.position.lat));
    result.west  = Math.min(...spotList.map(spot => spot.position.lng));
    return result;
}



const setMapFunc = ({ defaultPosition }: LatLngProps) => {
    // NEXT_PUBLIC_にしないと、サーバ側での処理となるためクライアントで使用できなくなり不具合が起こります。
    const googleMapsApiKey: string = process.env.NEXT_PUBLIC_GOOGLE_MAPS_API_KEY ?? 'NO API_KEY'
    if(googleMapsApiKey == 'NO API_KEY'){
        //Error code
    }
    const zoom: number = 5;
    const [map, setMap] = useState<Map | null>(null);
    const { isLoaded } = useJsApiLoader({
        id: "google-map",
        googleMapsApiKey: googleMapsApiKey,
    });
    const onLoad = (map: Map) => {
        // ここでどの範囲を初期状態で囲むかを１つのポジションで設定する
        const bounds = new window.google.maps.LatLngBounds(defaultPosition);
        map.fitBounds(createBoundsBySpots(spotList), { top: 50, right: 1.0, bottom: 22.1, left: 1.0 });
        // map.fitBounds(bounds);
        setMap(map);
    };

    return { zoom, map, isLoaded, onLoad };
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
                    <h1 className="title">{'メンズエミナル'}</h1>
                    </div>
                </div>
                {/* <Map/> */}
                {/* JSでの処理 */}
                {/* <div className="area area-map"> */}
                    {/* <div className="map " style={{width: '400px', height:'100px'}}
                    ></div> */}
                {/* </div> */}
                <GoogleMap>
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
