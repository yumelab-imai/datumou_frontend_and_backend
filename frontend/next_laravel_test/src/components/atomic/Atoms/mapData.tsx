// type Memo = {
//   title: string;
//   body: string;
// };

// export const tempMemos: Memo{} = {
//   {
//     title: '仮のタイトル1',
//     body: '仮のメモの内容1',
//   },
//   {
//     title: '仮のタイトル2',
//     body: '仮のメモの内容2',
//   },
//   {
//     title: '仮のタイトル3',
//     body: '仮のメモの内容3',
//   },
//   {
//     title: '仮のタイトル4',
//     body: '仮のメモの内容4',
//   },
//   {
//     title: '仮のタイトル5',
//     body: '仮のメモの内容5',
//   },
// };
type mapData = {
    id: string;
    name: string;
    imageUrl: string;
    eggsMode: boolean;
    disableIndex: boolean;
    myFavoriteClinic: boolean;
    myHatelinic: boolean;
    check: number[];
    spots: {
        s001: {
            id: string;
            name: string;
            imageUrl: string;
            eggsMode: string;
            disableIndex: string;
            myHatelinic: string;
            myFavoriteClinic: string;
            check: number[];
            spots: {
                s001:{
                    id : string,
                    name : string,
                    position : { lat : number, lng : number },
                    Distance : number,
                    externalLinkUrl : string,
                    someString : string,
                }
            };
        };
    };
}

const mapDatum  = [
    {
            'id' : 'c001',
            'name' : 'アサヒガワ動物園 × 園内スタンプラリー',
            'imageUrl' : '/imageUrl1',
            'eggsMode' : true,
            'disableIndex' : true,
            'myFavoriteClinic' : true,
            'myHatelinic' : false,
            'check' : [50, 100, 150],
            'spots' : {
                // This is a sample
                's001':{
                    'id' : 's001',
                    'name' : 'aoba clinic',
                    'position' : { 'lat' : 40.14214234234, 'lng' : 123.423432 },
                    'Distance' : 50,
                    'externalLinkUrl' : 'https://www.laravelvueport.link',
                    'someString' : '',
                }
            },
    }
];

export {mapDatum};