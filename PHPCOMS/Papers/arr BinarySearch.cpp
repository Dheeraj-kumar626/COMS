#include<bits/stdc++.h>
using namespace std;
int BinarySearch(int a[],int low,int high,int k){ //a has to be already sorted
cout<<"low,high are "<<low<<" "<<high<<"\n";
	int mid=(low+high)/2;
	cout<<"k,a[mid] are "<<k<<" "<<a[mid]<<"\n";
	if(a[mid]<=k && k<=a[mid+1]){
	cout<<"entered for k= "<<k<<"\n";
	return mid;
    }
  if(low<high){
	if(k>a[mid+1]){
	  return BinarySearch(a,mid+1,high,k);
	}
	else if(k<a[mid])
	return BinarySearch(a,low,mid,k);
   }
   return mid;
}
int main(){
	int a[]={3,5,8,11,12,27};int n=sizeof(a)/sizeof(a[0]);
//	sort(a,a+n);
	int k=7;
	int r=BinarySearch(a,0,n-1,k);
	cout<<" res is "<<r<<"\n";
	return 0;
}
