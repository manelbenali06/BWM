export interface User{
  "@id" ?:string;//le typage d emes variables
  id: number;
  email: string;
  roles:any;
  password:string;
  is_verified:boolean;
  lastName: string;
  firstName: string;
  address:string;
  zipCode:number
  city:string;
}
